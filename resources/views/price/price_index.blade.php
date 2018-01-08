@extends('layouts.agro_layout')

@section('main')

<div class="row">
    @if ( session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">  
        <h2>Добавление цены</h2>    
        <form action="{{ route('price.store') }}" method="POST">

          {!! csrf_field() !!}
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="goods_id">goods_id</label>
            <input type="text" class="form-control" id="goods_id" name="goods_id" placeholder="goods_id" value="{{ old('goods_id') }}">
            @if($errors->has('goods_id'))
                <span class="help-block">{{ $errors->first('goods_id') }}</span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('sprice') ? ' has-error' : '' }}">
            <label for="sprice">price</label>
            <input type="text" class="form-control" id="sprice" name="sprice" placeholder="price" value="{{ old('sprice') }}">
            @if($errors->has('price'))
                <span class="help-block">{{ $errors->first('sprice') }}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>

        </form>
    
        <br/><hr>
        <table class="table table-bordered">  
          <tr>  
               <th width="10%">id</th>  
               <th width="10%">goods_id</th>  
               <th width="15%">price</th>  
               <th width="15%">date</th>  
               <th width="10%">user_id</th>  
          </tr>
          @foreach ($sellings as $selling)
          <tr>
               <td>{{ $selling->id }}</td>
               <td>{{ $selling->goods_id }}</td>
               <td>{{ $selling->sprice }}</td>
               <td>{{ $selling->created_at }}</td>
               <td>{{ $selling->user_id }}</td>
          </tr>     
          @endforeach
        </table>
        
    </div>
</div>    

@endsection

