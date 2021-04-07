@extends('vendorr/layout')
@section('container')
<h1>Products</h1>
@if(Session::has('product-added'))
    <div class="alert alert-success" role="alert">
    {{Session::get('product-added')}}
    </div>
    @endif
<div class="col-lg-6">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Products</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('product.insert')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-pament" name="product_name" type="text" class="form-control"  >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Slug</label>
                                                <input id="cc-name" name="product_slug" type="text" class="form-control cc-name valid" 
                                                     >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Description</label>
                                                <input id="cc-number" name="description" type="text" class="form-control cc-number identified visa" 
                                                    >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Warranty</label>
                                                <input id="cc-number" name="warranty" type="text" class="form-control cc-number identified visa" 
                                                   >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="custom-file">
                                             <input type="file" name="image" class="custom-file-input" >
                                       <label class="custom-file-label" for="file">Choose file</label>
                                          </div>
  <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Stock</label>
                                                <input id="cc-number" name="stock" type="text" class="form-control cc-number identified visa" 
                                                    >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label mb-1">Category</label>
                                                </div>
                                                {{dd($category)}}
                                                <div class="col-12 col-md-9">
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="0">Select Category</option>
                                                        @foreach($category as $category)
                                                        @if($category==$category->id)
                                                        <option selected value="{{$category->id}}"></option>
                                                        @else
                                                        <option value="{{$category->id}}">
                                                        @endif
                                                        {{$category->category_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Price</label>
                                                <input id="cc-number" name="price" type="text" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Offer Price</label>
                                                <input id="cc-number" name="offer_price" type="text" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Discount Price</label>
                                                <input id="cc-number" name="discount_price" type="text" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Weight</label>
                                                <input id="cc-number" name="weight" type="text" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label mb-1">Select Sizes</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="size" id="select" class="form-control">
                                                        <option value="0">Select Sizes</option>
                                                        
                                                        <option value="s">s</option>
                                                        <option value="m">m</option>
                                                        <option value="l">l</option>
                                                        <option value="xl">xl</option>
                                                        <option value="xxl">xxl</option>
                                                      
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Colours</label>
                                                <input id="cc-number" name="colours" type="text" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label mb-1">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="status" id="select" class="form-control">
                                                        <option value="0">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Date</label>
                                                <input id="cc-number" name="date" type="date" class="form-control cc-number identified visa">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Add Product</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection