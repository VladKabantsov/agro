@extends('layouts.agro_layout')

@section('main')
    @if ( session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading">
        <span>Список товаров</span>
        <a href="{{ route('goods.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-file"></i> Новый</a>' 
        <p></p>
      </div>
    
    <div class="panel-body">
    <table class="table table-bordered table-striped" id="users-table">  
        <thead>
            <tr>  
               <th width="5%">id</th>  
               <th width="15%">name</th>  
               <th width="10%">barcode</th>  
               <th width="10%">categorory</th>  
               <th width="10%">manfac</th>  
               <th width="5%">measure</th>  
               <th width="10%">rec_price</th>  
            </tr>
        </thead>
        <tbody>
        @foreach ($goods as $one)
            <tr>
                <td>{{ $one->id }}</td>
                <td>{{ $one->g_name }}</td>
                <td>{{ $one->barcode }}</td>
                <td>{{ $one->cat_name }}</td>
                <td>{{ $one->manfac_name }}</td>
                <td>{{ $one->meas_name }}</td>
                <td>{{ $one->rec_price }}</td>
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

