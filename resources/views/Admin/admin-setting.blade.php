@extends('Admin.Layout.main')

@push('setting')
    actives
@endpush

@section('main-section')
    <div class="admin text-center">
        <h1>Setting</h1>
        <form class="px-2" action="{{url('/admin-setting/update/1')}}" method="post" enctype="multipart/form-data">
            @csrf
        <table>
            <tbody>
                @foreach ($setting as $item)
                    <tr>
                        <td colspan="2">
                            <img src="{{$item->background}}" alt="image" width="300px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="file" value="{{$item->background}}" name="background" />
                        </td>
                    </tr>
                    <tr>
                        <td>Company Name</td>
                        <td><input type="text" placeholder="Enter Company Name"  value="{{$item->company_name}}" name="company_name"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button>Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </form>
    </div>
@endsection