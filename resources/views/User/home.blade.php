@extends('User.Layout.main')

@push('home')
active
@endpush

@section('main-section')
    @if (session()->has('success'))
        <script>
            alert({{session()->get('success')}});
        </script>
    @endif
    @foreach ($setting as $item)
        <section id="title" style="background: url({{$item->background}});background-size: cover;background-position: center;">
            <h1>Welcome to {{$item->company_name}} Site</h1>
        </section>
    @endforeach

    <section id="main_body">
        <div id="featured" class="container">
            <h1 class="title">Featured Items</h1>
            <div class="row">
                @foreach ($products as $item)
                    <a href="{{url('products/')."/".$item->product_id}}" class="card">
                        <img src="{{$item->image}}" alt="{{$item->title}}">
                        <div class="info">
                            <h4>{{$item->title}}</h4>
                            <p class="sec">{{$item->genre}}</p>
                            <p>Rs {{$item->price}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection