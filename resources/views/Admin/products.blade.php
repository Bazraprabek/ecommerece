@extends('Admin.Layout.main')

@push('products')
    actives
@endpush

@section('main-section')
    <div class="admin">
        <div class="head">
            <h1>Products</h1>
            <div class="action">
                <a class="add_admin" href="{{url('admin-upload')}}">Upload</a>
                <a class="trash" href="{{url('products-trash')}}">Go To Trash</a>
            </div>
        </div>
        @if(session()->has('success'))
        <p style="color: green">{{session()->get('success')}}</p>  
        @endif
        <table class="table1">
            <tr>
                <th>S.N</th>
                <th>Image</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Created_Date</th>
                <th>Updated_Date</th>
                <th>Action</th>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($products as $item)
            <tr>
                <td>{{$i++}}</td>
                <td><img src="{{$item->image}}" width="100px" alt="Image of {{$item->title}}"></td>
                <td>{{$item->title}}</td>
                <td>{{$item->genre}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td><a href="{{url('admin-products/delete')."/".$item->product_id}}">Trash</a> <a href="{{url('admin-products/edit')."/".$item->product_id}}">Update</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection