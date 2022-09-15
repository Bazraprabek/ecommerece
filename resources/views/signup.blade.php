@extends('User.Layout.main')

@push('login')
active
@endpush

@section('main-section')
    <section class="login">
        <form action="" method="POST" class="box">
            @csrf
            <h1>Signup</h1>
            @if(session()->has('fail'))
            <p style="color: red">{{session()->get('fail')}}</p>  
            @endif
            <table>
                <tr>
                    <td>Fullname</td>
                    <td><input type="text" name="fullname" value="{{old('fullname')}}"></td>
                </tr>
                    @error('fullname')
                    <tr>
                        <td colspan="2">{{ $message }}</td>
                    </tr>
                    @enderror
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="{{old('email')}}"></td>
                </tr>
                    @error('email')
                    <tr>
                        <td colspan="2">{{ $message }}</td>
                    </tr>
                    @enderror
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                    @error('password')
                    <tr>
                        <td colspan="2">{{ $message }}</td>
                    </tr>
                    @enderror
                </tr>
            </table>
            <p>Already Have Account? <a href="{{url('login')}}">LogIn</a></p>
            <button>Login</button>
        </form>
    </section>
@endsection