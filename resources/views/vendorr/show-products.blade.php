@extends('vendorr/layout')
@section('container')
<h1>Edit Products</h1>
<div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                       
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Product Slug</th>
                                                <th>Description</th>
                                                <th>Warranty</th>
                                                <th>Product Image</th>
                                                <th>Stock</th>
                                                <th>Price</th>
                                                <th>Offer Price</th>
                                                <th>Discount Price</th>
                                                <th>Weight</th>
                                                <th>Size</th>
                                                <th>Colours</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                        @foreach($product as $product)
                                            <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_slug}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->warranty}}</td>
                                            <td><img src="{{asset('images')}}/{{$product->product_image}}" style="max-width:40px;" /></td>
                                            <td>{{$product->stock}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->offer_price}}</td>
                                            <td>{{$product->discount_price}}</td>
                                            <td>{{$product->weight}}</td>
                                            <td>{{$product->size}}</td>
                                            <td>{{$product->colours}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->date}}</td>
                                          
                                           <td>
                                           <a href=""><button class="btn btn-outline-success">Edit</button></a>
                                           <a href=""><button class="btn btn-outline-danger">Delete</button></a>
                                           </td>
                                            
                                            </tr>
                                          @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
@endsection