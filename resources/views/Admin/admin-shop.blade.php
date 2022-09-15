@extends('Admin.Layout.main')

@push('shop')
    actives
@endpush

@section('main-section')
    <div class="admin text-center">
        <h1>Shop</h1>
        <table class="table1">
            <tr>
                <th>S.N</th>
                <th>Image</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Created_Date</th>
                <th>Updated_Date</th>
                <th>Action</th>
            </tr>
        </table>
    </div>
@endsection