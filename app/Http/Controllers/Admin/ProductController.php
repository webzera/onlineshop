<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductMedia;
use App\Category;
use App\ProductCategory;
use App\SpecificationHeader;
use App\Attribute;
use App\ProductAttribute;
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
        $specheads = SpecificationHeader::all();
        $attributes = Attribute::all();
        // $selectedSpec = User::first()->role_id;
        return view('admin.product.create',compact('specheads', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcategoris($request, $productId)
    {
        if($request->category_id){
            foreach ($request->category_id as $categories[]);                
                foreach($categories as $categoryid){
                    if(!is_numeric($categoryid))
                    {
                        $catearr=explode(" - ",$categoryid);

                        // if(@count($catearr)==3)
                        if(count($catearr)==3)
                        {
                            $firstcate=Category::where('name', $catearr[0])->first();
                            if($firstcate)
                            {
                                $secondcate=Category::where([
                                    'parent_id' => $firstcate->id,
                                    'name' => $catearr[1]
                                ])->first();
                                if($secondcate){
                                    //add category table
                                    $category = new Category();
                                    $category->parent_id=$secondcate->id;
                                    $category->name=$catearr[2];
                                    $category->order=3;
                                    $category->slug=Str::of($catearr[2])->slug('-');
                                    $category->save();

                                    //add product category table
                                    $productcategory = new ProductCategory();
                                    $productcategory->product_id=$productId;
                                    $productcategory->category_id=$category->id;
                                    $productcategory->save();
                                }else
                                {
                                    $c_category = new Category();
                                    $c_category->parent_id=$firstcate->id;                
                                    $c_category->name=$catearr[1];
                                    $c_category->order=2;
                                    $c_category->slug=Str::of($catearr[1])->slug('-');
                                    $c_category->save();

                                    $cc_category = new Category();
                                    $cc_category->parent_id=$c_category->id;                
                                    $cc_category->name=$catearr[2];
                                    $cc_category->order=3;
                                    $cc_category->slug=Str::of($catearr[2])->slug('-');
                                    $cc_category->save();

                                    $productcategory = new ProductCategory();
                                    $productcategory->product_id=$productId;
                                    $productcategory->category_id=$cc_category->id;
                                    $productcategory->save();
                                }
                                
                            }else{
                                $category = new Category();                     
                                $category->name=$catearr[0];
                                $category->order=1;
                                $category->slug=Str::of($catearr[0])->slug('-');
                                $category->save();

                                $c_category = new Category();
                                $c_category->parent_id=$category->id;                
                                $c_category->name=$catearr[1];
                                $c_category->order=2;
                                $c_category->slug=Str::of($catearr[1])->slug('-');
                                $c_category->save();

                                $cc_category = new Category();
                                $cc_category->parent_id=$c_category->id;                
                                $cc_category->name=$catearr[2];
                                $cc_category->order=3;
                                $cc_category->slug=Str::of($catearr[2])->slug('-');
                                $cc_category->save();

                                $productcategory = new ProductCategory();
                                $productcategory->product_id=$productId;
                                $productcategory->category_id=$cc_category->id;
                                $productcategory->save();
                            }                        

                             
                        }
                    }else{
                        $productcategory = new ProductCategory();
                        $productcategory->product_id=$productId;
                        $productcategory->category_id=$categoryid;
                        $productcategory->save();    
                    }                
            }
        }
    }
    public function addimages($request, $productId)
    {
        $modelpromedia = new ProductMedia();
        if ($request->prod_image) {
                foreach ($request->prod_image as $key => $image)
                {
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

                    if($key == 0 || !$thisisfirst->exists())
                    {
                        $modelpromedia->cover_image=1;
                    }

                    $modelpromedia->product_id=$productId;
                    $modelpromedia->media_url=$name;
                    $modelpromedia->media_type=1;
                    $modelpromedia->save();                        

                    $modelpromedia = new ProductMedia();
                }            
        }
    }
    public function addattributs($request, $productId)
    {
        if(!empty($request->spec_head) && !empty($request->pro_attribute) && !empty($request->attribute_value)){
            foreach ($request->spec_head as $skey => $specheadvalue) {
                foreach ($request->pro_attribute as $akey => $attribname) {
                    foreach ($request->attribute_value as $vkey => $attribvalue) {
                        if($skey==$akey && $skey==$vkey){
                            if(!empty($specheadvalue) && !empty($attribname) && !empty($attribvalue)){
                                $productattribute= new ProductAttribute;
                                $productattribute->product_id=$productId;
                                $productattribute->specification_id=$specheadvalue;
                                $productattribute->attribute_id=$attribname;
                                $productattribute->value=$attribvalue;
                                $productattribute->created_by=auth()->id();
                                $productattribute->update_by=auth()->id();
                                $productattribute->save();
                            }                           
                        }
                    }
                }
            }
        }
       

    }

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

        // add product images
        //$this->addimages($request, $product->id);

        // add category details
        //$this->addcategoris($request, $product->id);

        // add attribute
        // specification, attribute, product_attribute
        $this->addattributs($request, $product->id);    
              
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
        $specheads = SpecificationHeader::all();
        $attributes = Attribute::all();

        $oldattrib = ProductAttribute::where('product_id', $id)->get();
      
        return view('admin.product.edit')
        ->with([
            'product'=> $product,
            'cate' => $cate,
            'specheads' => $specheads,
            'attributes' => $attributes,
            'oldattrib' => $oldattrib
        ]);
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
            'category_id' => 'required',
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

        // edit product images
        $this->addimages($request, $product->id);

        // edit category details
        //delete old categories
        ProductCategory::where('product_id', $product->id)->delete();
        $this->addcategoris($request, $product->id);

        // edit attribute
        // specification, attribute, product_attribute
        ProductAttribute::where('product_id', $product->id)->delete();        
        $this->addattributs($request, $product->id);       

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
