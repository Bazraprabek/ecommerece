@extends('User.Layout.main')

@push('products')
active
@endpush

@section('main-section')
    <section id="products">
        <div class="products_head">
            <h2>Products</h2>
            <span id="found">{{$results ?? "" }}</span>
            <div class="sort">
                <span>Sort By:</span> 
                <select name="sort" id="sort">
                    <option value="action">Action</option>
                    <option value="comedy">Comedy</option>
                    <option value="adventure">Adventure</option>
                </select>
            </div>
        </div>
        <div class="row" id="row">
            @if ($products != "")
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
            @else
                <div class="empty"></div>
            @endif
        </div>
    </section>

    {{-- Ajax JQuery--}}
    <script>
        $('#sort').on('change',function(){
            $('#row').html("<div class='spinner'></div>");
            $('#found').html("");
            $value=$(this).val();
            $.ajax({
                type:'get',
                url:'{{URL::to('sort')}}',
                data:{'sort':$value},

                success:function(data){
                    $('#row').html(data);
                }

            });
        })
    </script>
@endsection