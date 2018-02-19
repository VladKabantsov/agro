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
        <div class="panel-body col-md-10">
            <table class="table table-bordered table-striped" id="users-table">
                <thead>
                    <tr>
<!--                       <th width="5%">id</th>-->
                       <th>Имя</th>
                       <th>Код</th>
                       <th>Кат-ия</th>
                       <th>Подкат-ия</th>
                       <th>Про-ль</th>
                       <th>Ед. изм-ия</th>
                       <th>Цена покупки</th>
                       <th>Цена продажи</th>
                       <th>Кол-во</th>
                       <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($goods as $key => $one)
                    <tr>
<!--                        <td>{{ $one->id }} {{ $key }}</td>-->
                        <td>{{ $one->g_name }}</td>
                        <td>{{ $one->barcode }}</td>
                        <td>{{ $one->cat_name }}</td>
                        <td>{{ $one->subcategories_name }}</td>
                        <td>{{ $one->manfac_name }}</td>
                        <td>{{ $one->meas_name }}</td>
                        <td>{{ $one->price_purchase }}</td>
                        <td>{{ $one->rec_price }}</td>
                        <td>{{ $one->quantity }}</td>
                        <td>
                            @if( $one->quantity==0 )
                                <a href="{{ route('goods.edit', $one->id )}}" class="btn btn-primary pull-right" style="margin-bottom: 25px">Изменить</a>
                                <form action="{{ route('goods.destroy' , $one->id)}}" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-primary pull-right delete">Удалить</button>
                                </form>
                            @else
                                <a href="{{ route('goods.edit', $one->id )}}" class="btn btn-primary pull-right" style="margin-bottom: 25px">Изменить</a>
                                <form action="{{ route('goods.destroy' , $one->id)}}" class="deleteNotActive" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-primary pull-right ">Удалить</button>
                                </form>
                            @endif
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

