@extends('layouts.agro_layout')

@section('main')
    @if ( session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading" style="padding-bottom: 25px">
        <span>Список товаров</span>
        <a href="{{ route('goods.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-file"></i> Новый</a>
      </div>
    <div class="row list-of-goods">
        <div class="col-md-2">
            @yield('list')
        </div>
        <div class="panel-body col-md-10 scroll">
            <table class="table table-bordered table-striped" id="users-table">
                <thead>
                    <tr>
                       <th width="5%">id</th>
                       <th width="15%">Имя</th>
                       <th width="10%">Код</th>
                       <th width="10%">Кат-ия</th>
                       <th width="10%">Подкат-ия</th>
                       <th width="10%">Про-ль</th>
                       <th width="5%">Мера</th>
                       <th width="10%">Цена</th>
                       <th width="10%">Действие</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($goods as $one)
                    <tr>
                        <td>{{ $one->id }}</td>
                        <td>{{ $one->g_name }}</td>
                        <td>{{ $one->barcode }}</td>
                        <td>{{ $one->cat_name }}</td>
                        <td>{{ $one->subcategories_name }}</td>
                        <td>{{ $one->manfac_name }}</td>
                        <td>{{ $one->meas_name }}</td>
                        <td>{{ $one->rec_price }}</td>
                        <td>
                            <a href="{{ route('goods.edit', $one->id )}}" class="btn btn-primary pull-right" style="margin-bottom: 25px">Изменить</a>
                            <form action="{{ route('goods.destroy' , $one->id)}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-primary pull-right">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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

