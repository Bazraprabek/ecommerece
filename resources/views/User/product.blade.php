@extends('User.Layout.main')

@push('products')
active
@endpush

@section('main-section')
        <div class="product">
            <img src="{{$product->image}}" alt="{{$product->title}}">
            <h1>{{$product->title}}</h1>
            <h2>{{$product->price}}</h2>
            <p>{{$product->desc}}</p>
        </div>
@endsection