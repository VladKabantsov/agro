@extends('layouts.agro_layout')

@section('main')
@if ( session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        <span>Список пользователей</span>
        <a href="{{ route('user.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-file"></i> Новый</a>
        <p></p>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped" id="users-table">
            <thead>
                <tr>
                    <th width="10%">id</th>
                    <th width="10%">name</th>
                    <th width="10%">email</th>
<!--                    <th width="18%">password</th>-->
                    <th width="10%">role</th>
                    <th width="10%">shop_id</th>
                    <th width="10%">options</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $one)
            <tr>
                <td>{{ $one->id }}</td>
                <td>{{ $one->name }}</td>
                <td>{{ $one->email }}</td>
<!--                <td>{{ $one->password }}</td>-->
                <td>{{ $one->role_name }}</td>
                <td>{{ $one->shop_id }}</td>
                <td>
                    <a href="{{ route( 'user.edit', $one->id ) }}" class="btn btn-primary pull-right" style="margin-bottom: 10px">Изменить</a>
                    <form action="{{ route('user.destroy' , $one->id)}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}

                            <button type="submit" id="delete" class="btn btn-primary pull-right">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="panel-footer">
        <p>Just testing...</p>
    </div>
</div>
@endsection

@push('scripts')
<!--<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '{{}}',
               "columns": [
                    {data: "id" },
                    {data: "g_name" },
                    {data: "barcode" },
                    {data: "cat_name" },
                    {data: "manfac_name"},
                    {data: "meas_name"},
                    {data: "rec_price"},
                ]
        });
    });
</script>-->
@endpush

