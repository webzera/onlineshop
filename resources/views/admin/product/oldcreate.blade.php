@extends('admin.layouts.main')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
  .select2-container .select2-selection--single {
    height: 34px;
  }
  #jvue ul{
  list-style-type: none;
  margin: 0;
  padding: 0;
  }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Product</h1>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('product.index')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i>View Product</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              @include('_includes.messages')
              <div class="card-body">
                <h5 class="card-title">Add Product Details</h5>
        <div class="table-responsive">
    <form action="{{route('product.store')}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
    <div class="col-md-12">
      <div class="row">
      <div id="create_post" class="col-md-7">
        <div class="form-group">
        <label for="product_name">Product Name(Model)<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product name">
        </div>
        <div class="form-group">
        <label for="prod_desc">Excerpt of Product<span style="color: red;">*</span></label>
        <textarea class="form-control" rows="3" name="prod_desc" id="prod_desc" placeholder="Enter Description of the Product"></textarea>
        </div>      
        <div class="form-group">
        <label for="prod_image">Upload Product Photo<span style="color: red;">*</span></label><br>
        <input type="file" name="prod_image" value="" />  {{-- <span style="color: blue" > Check image height 1200x500 </span> --}}
        </div>
        <div class="form-group">
        <label for="video_link">Video embeded code<span style="color: red;">*</span></label> <span> [Size : 358 x 250]</span>
        <input type="text" class="form-control" name="video_link" id="video_link" placeholder="Paste video embeded code">
        </div>      
      </div>
      <div class="col-md-5">
        <div class="form-group">
        <label for="SKU">Product SKU<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="SKU" id="SKU" placeholder="Enter S K Unit">
        </div>
        <div class="form-group">
          <label for="cate_id">Select Category<span style="color: red;">*</span></label>
          <select name="prodcate_id" class="form-control" id="cate_id">
            <option value=''>--select category--</option>
            <?php $allcate=App\Category::all(); ?>
            @foreach ($allcate as $row)
              <option value="{{ $row->id }}">{{ $row->cate_name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="subcate_id">Select Subcategory<span style="color: red;">*</span></label>
          <select name="prodsubcate_id" class="form-control" id="subcate_id">
            <option value=''>--select Subcategory--</option>            
          </select>
        </div>

        <div class="form-group">
        <label for="price">Product Price<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Enter Product price">
        </div>

        <div class="form-group">
        <label for="weightage">Sort Weightage</label>
        <input type="text" class="form-control" name="weightage" id="weightage" placeholder="Enter Weightage value">
        </div>
        
      </div>
      </div> <!-- row -->    
      <div class="row">
        <div class="col-md-11">
          <div id="jvue"> 
            <div><h5>Add Specifications</h5></div><?php session()->forget('spec_title'); session()->forget('spec_desc'); ?>       
            <table class="table">
            <thead>
                <tr>
                    <td width="45%"><strong>Title</strong></td>
                    <td width="45%"><strong>Description</strong></td>
                    <td width="10%"></td>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>
                      <ul>
                        <li v-for="sp_title in sp_titles" v-text="sp_title"></li>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <li v-for="sp_desc in sp_descs" v-text="sp_desc"></li>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <li v-for="(sp_desc, index) in sp_descs"><a v-on:click="removeElement(index);" style="cursor: pointer"><i class="fa fa-trash-alt" aria-hidden="true"></i></a></li>
                      </ul>
                    </td>


                </tr>
                
            </tbody>
          </table>
            <div class="form-group">  <hr>

        <div class="row">
        <div class="col-md-5">
        <input v-on:keyup="checkValid" class="form-control" type="text" v-model="newsp_title" placeholder="Enter Specification Title">
        </div>
        <div class="col-md-5">
        <input  v-on:keyup="checkValid" class="form-control" type="text" v-model="newsp_desc" placeholder="Enter Specification Description">
        </div>

        <div class="col-md-2">
        <a :class="{disabled: btnDisabled}" class="form-control btn btn-success" href="javascript:void(0)" v-on:click="addRow">Add</a>
        </div>
        </div>

          </div>

          </div>
        </div>
      </div>
  </div>
    <button type="submit" class="btn btn-success float-right">Submit</button>
    </form>
      </div>
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>

var app = new Vue({
            el: "#jvue",
            data: {                
                sp_titles: [],
                newsp_title: "",
                sp_descs: [],
                newsp_desc: "",
                btnDisabled: true
                // spec_title : "",
                // spec_desc : "",
            },
            methods: {
                addRow: function() { 
                    this.sp_titles.push(this.newsp_title);
                    this.sp_descs.push(this.newsp_desc);  
                                      
                    axios.post('setspecsession', {
                      spec_title:this.newsp_title,
                      spec_desc:this.newsp_desc
                    })
                    .then(this.onSucess)
                      .catch(function (error) {
                        console.log(error);
                      });
                                                    
                },
                removeElement: function(index) {
                    this.sp_titles.splice(index, 1);
                    this.sp_descs.splice(index, 1);
                    axios.post('removespecsession', {
                      keyval:index,                      
                    });
                },
                checkValid: function(){                  
                  if(this.newsp_title != '' && this.newsp_desc != ''){
                    this.btnDisabled=false;                    
                  }
                  else{
                    this.btnDisabled=true; 
                  }          
                },
                onSucess: function(){
                  this.newsp_title='';
                  this.newsp_desc='';
                  this.btnDisabled=true
                }
            }
        });





$(document).ready(function() {
    $("#cate_id").select2({
    maximumSelectionLength: 2
    });
     $("#subcate_id").select2({
    maximumSelectionLength: 2
    });
});

//dropdown
$('#cate_id').on('change', function(e){ 

  var cate_id = e.target.value;
  // console.log(cate_id);

  //ajax
  $.get('http://localhost/meghatrade/public/admin/ajax_subcate?cate_id='+ cate_id, function(data){
  // $.get('http://meghatrade.com/admin/ajax_subcate?cate_id='+ cate_id, function(data){
    // success
    $('#subcate_id').empty();
    $('#subcate_id').append('<option value="0" >--select Subcategory--</option>');

    $.each(data, function(index, subcateObj){
      $('#subcate_id').append('<option value='+subcateObj.id+'>'+subcateObj.subcate_name+'</option>');
    });    
    // console.log(data);
  });
});

</script>
@endsection