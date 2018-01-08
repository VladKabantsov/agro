@extends('layouts.agro_layout')

@section('main')
<div class="row">
    @if ( session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <h2>Продажа товара</h2>    
    <form action="/warehouse" method="POST">

      {!! csrf_field() !!}
      <div class="form-group{{ $errors->has('goods_id') ? ' has-error' : '' }}">
        <label for="goods_id">goods_id</label>
        <input type="text" class="form-control" id="goods_id" name="goods_id" placeholder="goods_id" value="{{ old('goods_id') }}">
        @if($errors->has('goods_id'))
            <span class="help-block">{{ $errors->first('goods_id') }}</span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
        <label for="quantity">quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
        @if($errors->has('quantity'))
            <span class="help-block">{{ $errors->first('quantity') }}</span>
        @endif
      </div>

      <button type="submit" class="btn btn-primary">Добавить</button>

    </form>
    <br/><hr>
    <table class="table table-bordered">  
      <tr>  
           <th width="20%">shop_id</th>  
           <th width="20%">goods_id</th>  
           <th width="20%">remaining</th>  
           <th width="20%">price</th>
           <th width="20%">*</th>
      </tr>
      @foreach ($goods as $one)
      <tr>
           <td>{{ $one->shop_id }}</td>
           <td>{{ $one->goods_id }}</td>
           <td>{{ $one->rem_goods }}</td>
           <td>{{ $one->sprice }}</td>
           <td>
               <form action="#" method="GET">
                   {!! csrf_field() !!}
                   <a class="btn btn-small btn-success" href="">Show</a>
                   <a class="btn btn-small btn-info" href="">Edit</a>
               </form>
           </td>
      </tr>     
      @endforeach
    </table>
    
</div>    
@endsection

