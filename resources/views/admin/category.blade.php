@extends('admin/layout')
@section('container')
<h1>Category</h1>
@if(Session::has('category-added'))
    <div class="alert alert-success" role="alert">
    {{Session::get('category-added')}}
    </div>
    @endif
    @if(Session::has('category-deleted'))
    <div class="alert alert-danger" role="alert">
    {{Session::get('category-deleted')}}
    </div>
    @endif
<div class="col-lg-6">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Category</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="category_name" type="text" class="form-control"   >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Category Slug</label>
                                                <input id="cc-name" name="category_slug" type="text" class="form-control" >
                                                    
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" ></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Description</label>
                                                <input id="cc-number" name="description"  class="form-control cc-number identified visa" 
                      
                                                    >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" name="file" class="custom-file-input" id="inputGroupFile02" onchange="previewFile(this)">
    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
  </div>
  
  <img id="previewImg"  alt="Category Image" style="max-width:130px;"><br>
  <div class="input-group-append">
    
  </div>
</div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount">Add</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
   <!-- Table -->
   <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                       
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Category Slug</th>
                                                <th>Description</th>
                                                <th class="text-right">Image</th>
                                                
                                                <th class="text-right">Action</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                        @foreach($category as $category)
                                            <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->category_name}}</td>    
                                            <td>{{$category->category_slug}}</td> 
                                            <td>{{$category->description}}</td> 
                                            <td><img src="{{asset('images')}}/{{$category->image}}" style="max-width:40px;" /></td>
                                            <td>
                                            <a href="/edit-category/{{$category->id}}"><button class="btn btn-outline-success">Edit</button></a>
                                            <a href="/del-category/{{$category->id}}"><button class="btn btn-outline-danger">Delete</button></a>
                                            </td>
                                            </tr>
                                          
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <script>
                                function previewFile(input)
                                {
                                    var file=$("input[type=file]").get(0).files[0];
                                if(file)
                                {
                                    var reader = new FileReader();
                                    reader.onload=function()
                                    {
                                        $('#previewImg').attr("src",reader.result);
                                    }
                                    reader.readAsDataURL(file);
                                }
                                }
                              
                                </script>
@endsection