@extends('admin/layout')

@section('container')
@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Vendor Name</th>
                                                <th>Email</th>
                                                <th class="text-right">Location</th>
                                                <th class="text-right">Phone</th>
                                                <th class="text-right">Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $list)
                                            <tr>

                                                <td>{{$list->id}}</td>
                                                <td>{{$list->vendor_name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td class="text-right">{{$list->location}}</td>
                                                <td class="text-right">{{$list->phone}}</td>
                                                <td class="text-right">@if($list->status==0)Inactive @else Active @endif</td>
                                                <td class="text-right"><a href="{{route('status',['id'=>$list->id])}}">@if($list->status==1)Inactive @else Active @endif</a>
                                                
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
@endsection