@extends('Admin.Layout.main')

@push('account')
    actives
@endpush

@section('main-section')
    <div class="admin">
        <div class="head">
            <h1>Account Trash</h1>
            <a class="add_admin" href="{{url('admin-account')}}">Go Back</a>
        </div>
        @if(session()->has('success'))
        <p style="color: green">{{session()->get('success')}}</p>  
        @endif
        <table class="table1">
            <tr>
                <th>S.N</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created_Date</th>
                <th>Updated_Date</th>
                <th>Action</th>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($user as $item)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td><a href="{{url('admin-account/forcedelete')."/".$item->id}}" onclick="return confirm('Are you sure want to delete permanentlty?')">Delete</a> <a href="{{url('admin-account/restore')."/".$item->id}}">Restore</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection