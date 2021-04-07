@extends('admin/layout')
@section('container')
@if(Session::has('category-updated'))
    <div class="alert alert-success" role="alert">
    {{Session::get('category-updated')}}
    </div>
    @endif
<div class="col-lg-6">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Category</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('category.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$category->id}}">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="category_name" value={{$category->category_name}} type="text" class="form-control"   >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Category Slug</label>
                                                <input id="cc-name" name="category_slug" value={{$category->category_slug}} type="text" class="form-control" >
                                                    
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" ></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Description</label>
                                                <input id="cc-number" name="description" value={{$category->description}}  class="form-control cc-number identified visa" 
                      
                                                    >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" name="file" class="custom-file-input" id="inputGroupFile02">
    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
    <img src="{{asset('images')}}/{{$category->image}}" alt="" style="max-width:40px"><br>
  </div>
  

  <div class="input-group-append">
    
  </div>
</div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount">Update</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
   <!-- Table -->
@endsection