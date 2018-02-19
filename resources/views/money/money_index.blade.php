@extends('layouts.agro_layout')

@section('main')
@if ( session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading" style="padding-bottom: 25px">
        <span>Денежные средства</span>
    </div>
    <div class="row">
        <div class="col-xs-offset-1 col-xs-4">
            <h1>Оборотные средства</h1>
            <p class="active-money">{{ $active }} грн</p>
            <form action="{{ route('money.update', 'active') }}" method="POST">
                <input name="_method" type="hidden" value="PUT">
                <input name="active" type="text" value="">
                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
        <div class="col-xs-offset-1 col-xs-4">
            <h1>Прибыль</h1>
            <p class="revenue">{{ $revenue }} грн</p>
            <form action="{{ route('money.update', 'revenue') }}" method="POST">
                <input name="_method" type="hidden" value="PUT">
                <input name="revenue" type="text" value="">
                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary">Снять</button>
            </form>
        </div>
    </div>
    <br>
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

