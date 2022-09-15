@extends('User.Layout.main')

@push('login')
active
@endpush

@section('main-section')
    <div class="container px-2">
        <h1 class="text-center">Setting</h1>
        <form action="">
            <table class="px-2">
                <tbody>
                    <tr>
                        <td>Fullname</td>
                        <td><input type="text" value="{{$fullname}}"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" value="{{$email}}"></td>
                    </tr>
                </tbody>
            </table>
            <button>Update</button>
        </form>
    </div>
@endsection