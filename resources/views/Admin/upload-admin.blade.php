@extends('Admin.Layout.main')

@push('products')
    actives
@endpush

@section('main-section')
    <div class="admin text-center">
        <h1>Upload</h1>
        @if(session()->has('fail'))
        <p style="color: red">{{session()->get('success')}}</p>  
        @endif
        <form method="post" action="" class="px-2" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{old('title')}}" name="title"><br><br>
            @error('title')
            {{ $message }}
            <br>
            @enderror
            <input type="text" value="{{old('genre')}}" name="genre"><br><br>
            @error('genre')
            {{ $message }}
            <br>
            @enderror
            <input type="file" value="{{old('image')}}" name="image"><br><br>
            @error('image')
            {{ $message }}
            <br>
            @enderror
            <input type="number" value="{{old('price')}}" name="price"><br><br>
            @error('price')
            {{ $message }}
            <br>
            @enderror
            <input type="number" value="{{old('rating')}}" name="rating" max="5" min="1"><br><br>
            @error('rating')
            {{ $message }}
            <br>
            @enderror
            <textarea name="desc" cols="30" rows="10">{{old('desc')}}</textarea>
            @error('desc')
            {{ $message }}
            <br>
            @enderror
            <br><br>
            <button>Upload</button>
        </form>
    </div>
@endsection