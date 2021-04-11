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
                                           
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Description</label>
                                                <input id="cc-number" name="description"  class="form-control cc-number identified visa" 
                      
                                                    >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="col col-md-9">
                                                    <div class="form-check-inline form-check">
                                                        <label for="inline-checkbox1" class="form-check-label ">Is Parent</label>
                                                            <input type="checkbox" id="is_parent" name="is_parent" value="1" class="form-check-input ml-2" checked>Yes
                                                        
                                                    </div>
                                                </div>

                                                <div class="row form-group " id="parent_category_div">
                                                <div class="col col-md-3" > >
                                                    <label for="parent_id" class=" form-control-label">Parent Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="parent_id" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        @foreach($parent_cats as $pcats)
                                                        <option value="{{$pcats->id}}">{{$pcats->category_name}}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                             <div class="custom-file">
                                             <input type="file" name="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
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
                                                <th>Is Parent</th>
                                                <th>Parent</th>
                                                <th>Status</th>
                                                <th>Action</th>
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
                                            <td>{{$category->is_parent==1 ? 'Yes' : 'No'}}</td>
                                            <td>{{\App\Models\Category::where('id',$category->parent_id)->value('category_name')}}</td>
                                            <td>
                                            <input type="checkbox" checked data-toggle="toggle" value="{{$category->id}}" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                            
                                            </td>
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
                                // $('#is_parent').change(function(e)
                                // {
                                //     e.preventDefault();
                                //     var is_checked=$('#is_parent').prop('checked');
                                   
                                //     if(is_checked)
                                //     {
                                //         $('#parent_category_div').addClass('d-none');
                                //     }
                                //     else{
                                //         $('#parent_category_div').removeClass('d-none');
                                //     }
                                // })
                                // $(document).ready(function ()
                                // {
                                //     $('#is_parent').change(function ()
                                //     {
                                //         if(!this.checked)
                                //         $('#parent_category_div').fadeIn('slow');
                                    
                                //     else
                                    
                                //         $('#parent_category_div').fadeOut('slow');
                                //     });
                                    
                                // });
                              
                                </script>
                               
@endsection