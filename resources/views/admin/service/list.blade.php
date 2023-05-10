@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Slider</th>
            <th>Duong dan</th>
            <th>Hinh anh</th>
            <th>Noi dung</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $key => $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->url }}</td>
                <td><img src="{{ $service->thumb }}" alt="{{ $service->name }}" width="120" height="120"></td>
                <td>{{ $service->content }}</td>
                <td>{!! \App\Helpers\Helper::active($service->active) !!}</td>
                <td>{{ $service->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/services/edit/{{ $service->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$service->id}} ', '/admin/services/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $services->links() !!}
    </div>
@endsection
