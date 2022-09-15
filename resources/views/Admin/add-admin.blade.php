@extends('Admin.Layout.main')

@push('account')
    actives
@endpush

@push('title')
    Add Admin
@endpush

@section('main-section')
    <div class="admin text-center">
        <h1>Add Admin</h1>
        @if(session()->has('fail'))
        <p style="color: red">{{session()->get('fail')}}</p>  
        @endif
        <form method="POST" action="" class="px-2">
            @csrf
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname">
            <br>
            @error('fullname')
                {{ $message }}
                <br>
            @enderror
            <br>
            <label for="email">Email</label>
            <input type="email" name="email">
            <br>
            @error('email')
                {{ $message }}
                <br>
            @enderror
            <br>
            <label for="password">Password</label>
            <input type="password" name="password">
            <br>
            @error('password')
                {{ $message }}
                <br>
            @enderror
            <br>
            <button>Add</button>
        </form>
    </div>
@endsection