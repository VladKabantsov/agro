@extends('layouts.agro_layout')

@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Список продаж на кассе</h2>
    </div>

    <div class="panel-body">
    <table class="table table-bordered table-striped" id="users-table">  
        <thead>
            <tr>  
               <th width="5%">id</th>  
               <th width="5%">order_id</th>  
               <th width="10%">quantity</th>  
               <th width="10%">price1</th>  
               <th width="10%">price2</th>  
               <th width="5%">user_id</th>  
               <th width="5%">shop_id</th>  
            </tr>
        </thead>
        <tbody>
        @foreach ($logs as $one)
            <tr>
                <td>{{ $one->id }}</td>
                <td>{{ $one->order->id }}</td>
                <td>{{ $one->quantity }}</td>
                <td>{{ $one->price1 }}</td>
                <td>{{ $one->price2 }}</td>
                <td>{{ $one->user_id }}</td>
                <td>{{ $one->shop_id }}</td>
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

