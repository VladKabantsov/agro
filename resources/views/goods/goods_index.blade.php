@extends('layouts.agro_layout')

@section('main')
<div class="row">  
    <h2>Добавление товара</h2>    
        <form action="/goods" method="POST">

          {!! csrf_field() !!}
          <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">
            <label for="barcode">Штрих-код</label>
            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="barcode" value="{{ old('barcode') }}">
            @if($errors->has('goods_id'))
                <span class="help-block">{{ $errors->first('barcode') }}</span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('categories_id') ? ' has-error' : '' }}">
            <label for="categories_id">категория</label>
            <input type="text" class="form-control" id="categories_id" name="categories_id" placeholder="categories_id" value="{{ old('categories_id') }}">
            @if($errors->has('goods_id'))
                <span class="help-block">{{ $errors->first('categories_id') }}</span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
            <label for="quantity">quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
            @if($errors->has('quantity'))
                <span class="help-block">{{ $errors->first('quantity') }}</span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="price">price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="price" value="{{ old('price') }}">
            @if($errors->has('price'))
                <span class="help-block">{{ $errors->first('price') }}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>

        </form>
</div>    
    <br/><hr>
    <table class="table table-bordered">  
      <tr>  
           <th width="10%">id</th>  
           <th width="10%">goods_id</th>  
           <th width="15%">quantity</th>  
           <th width="15%">remaining</th>  
           <th width="15%">price</th>  
           <th width="15%">date</th>  
           <th width="10%">user_id</th>  
      </tr>
      @foreach ($goods as $one)
      <tr>
           <td>{{ $one->id }}</td>
           <td>{{ $one->goods_id }}</td>
           <td>{{ $one->quantity }}</td>
           <td>{{ $one->rem_goods }}</td>
           <td>{{ $one->price }}</td>
           <td>{{ $one->date }}</td>
           <td>{{ $one->user_id }}</td>
      </tr>     
      @endforeach
    </table>
@endsection

