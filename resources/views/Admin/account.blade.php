@extends('Admin.Layout.main')

@push('account')
    actives
@endpush

@section('main-section')
    <div class="admin">
        <div class="head">
            <h1>Account</h1>
            <div class="action">
                <a class="add_admin" href="{{url('add-admin')}}">Add Admin</a>
                <a class="trash" href="{{url('account-trash')}}">Go To Trash</a>
            </div>
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
                <td><a href="{{url('admin-account/delete')."/".$item->id}}">Trash</a> <a href="{{url('admin-account/edit')."/".$item->id}}">Update</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection