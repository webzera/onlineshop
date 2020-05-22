<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductMedia;
use App\ProductCategory;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct(){

        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allproduct=Product::orderBy('weightage', 'desc')->paginate(10);
        return view('admin.product.index')->with('allproduct', $allproduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'=> 'required',
            'brand'=> 'required',
            'prod_desc' => 'required',
            'SKU' => 'required',
            'category_id' => 'required',
            // 'prod_image' => 'required',
            'price' => 'required',
        ]);

        $product= new Product;

        $product->product_name=$request->input('product_name');      
        $product->slug=Str::of($request->product_name)->slug('-');
        $product->brand=$request->input('brand');
        $product->prod_desc=$request->input('prod_desc');
        $product->SKU=$request->input('SKU');
        $product->video_link=$request->input('video_link');
        $product->price=$request->input('price');
        if($request->input('weightage')) $product->weightage=$request->input('weightage');
        else $product->weightage=1;
        $product->status=1;
        $product->save();

        $modelpromedia = new ProductMedia();
        if ($request->prod_image) {
                foreach ($request->prod_image as $key => $image)
                {
                    //$image = $request->file('prod_image');
                    $slug=Str::of($image)->slug('-');
                    $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/storage/product');
                    // $destinationPath = '/home/megha/public_html/storage/product';
                    $imagePath = $destinationPath. "/".  $name;
                    if(!$image->move($destinationPath, $name))
                    {
                        echo "file not upload"; die();
                    }
                    // $product->prod_image = $name;                      

                    if($key == 0)
                    {
                        $modelpromedia->cover_image=1;
                    }

                    $modelpromedia->product_id=$product->id;
                    $modelpromedia->media_url=$name;
                    $modelpromedia->media_type=1;
                    $modelpromedia->save();                        

                    $modelpromedia = new ProductMedia();
                }            
        }

        // add category details
        if($request->category_id){
            foreach ($request->category_id as $categories[]);                
                foreach($categories as $categoryid){
                    $productcategory = new ProductCategory();
                    $productcategory->product_id=$product->id;
                    $productcategory->category_id=$categoryid;
                    $productcategory->save();
            }
        }


        

        /*Add attrib*/
        // if (isset($_REQUEST['productidforattrib'])) {
        //     $modelproattri = new Productattributes();                              
        //     //echo $proid=$_REQUEST['productidforattrib'];
        //     $proid=$model->id;
            
        //     foreach ($_REQUEST as $key => $value) {
        //         if($key!='_csrf' && $key!='productidforattrib' && $value!='') {
        //             //echo $key." : ".$value; echo "<br>"; 
        //             $subquery=Productattributes::find()->where(['product_at_feild_id'=>$key,'status' => 1,'product_id' => $proid ])->asArray()->all();
                    
        //             if(!$subquery){
        //                 $modelproattri->product_id=$proid;
        //                 $modelproattri->product_at_feild_id=$key;
        //                 $modelproattri->product_at_vallue=$value;
        //                 $modelproattri->save();
        //                 $modelproattri = new Productattributes();
        //             }
        //         }
        //     } 
        //     //return Yii::$app->response->redirect('update?id='.$proid.'&tabswit=3');
        // }   
        /*attrib end*/

        flash('Product added Successfully!');
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $cate=$product->categories;
        return view('admin.product.edit')
        ->with(['product'=> $product, 'cate' => $cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name'=> 'required',
            'brand'=> 'required',
            'prod_desc' => 'required',
            'SKU' => 'required',
            // 'prodcate_id' => 'required',
            // 'prodsubcate_id' => 'required',
            // 'prod_image' => 'required',
            'price' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->product_name=$request->input('product_name');      
        $product->slug=Str::of($request->product_name)->slug('-');
        $product->brand=$request->input('brand');
        $product->prod_desc=$request->input('prod_desc');
        $product->SKU=$request->input('SKU');
        $product->video_link=$request->input('video_link');
        $product->price=$request->input('price');
        if($request->input('weightage')) $product->weightage=$request->input('weightage');
        else $product->weightage=1;
        $product->status=1;
        $product->save();

        $modelpromedia = new ProductMedia();
        if ($request->prod_image) {            
                foreach ($request->prod_image as $key => $image)
                {
                    //$image = $request->file('prod_image');
                    $slug=Str::of($image)->slug('-');
                    $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/storage/product');
                    // $destinationPath = '/home/megha/public_html/storage/product';
                    $imagePath = $destinationPath. "/".  $name;
                    if(!$image->move($destinationPath, $name))
                    {
                        echo "file not upload"; die();
                    }                    
                    $thisisfirst=ProductMedia::where(['product_id' => $product->id, 'cover_image' => 1]);   

                    // dd($thisisfirst->exists());

                    if($key == 0 && !$thisisfirst->exists())
                    {
                        $modelpromedia->cover_image=1;
                    }

                    $modelpromedia->product_id=$product->id;
                    $modelpromedia->media_url=$name;
                    $modelpromedia->media_type=1;
                    $modelpromedia->save();                        

                    $modelpromedia = new ProductMedia();
                }                        
        }

        // edit category details
            //delete old categories
        ProductCategory::where('product_id', $product->id)->delete();
        if($request->category_id){
            foreach ($request->category_id as $categories[]);                
                foreach($categories as $categoryid){
                    $productcategory = new ProductCategory();
                    $productcategory->product_id=$product->id;
                    $productcategory->category_id=$categoryid;
                    $productcategory->save();
            }
        }
        

        flash('Product Updated Successfully!');
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
