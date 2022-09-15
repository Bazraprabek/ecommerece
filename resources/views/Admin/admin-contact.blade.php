@extends('Admin.Layout.main')

@push('contact')
    actives
@endpush

@section('main-section')
    <div class="admin">
        <h1 class="text-center">Contact</h1>
        @if(session()->has('success'))
        <p style="color: green">{{session()->get('success')}}</p>  
        @endif
        <table class="table1">
            <tr>
                <th>S.N</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Message</th>
                <th>Send_at</th>
                <th>Action</th>
            </tr>
            @php
                $sn = 1;
            @endphp
            @foreach ($contact as $item)
            <tr>
                <td>{{$sn++}}</td>
                <td>{{$item->fullname}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->msg}}</td>
                <td>{{$item->created_at}}</td>
                <td><a href="{{url('admin-contact/delete')."/".$item->cid}}" onclick="return confirm('Are you sure want to delete permanentlty?')">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection