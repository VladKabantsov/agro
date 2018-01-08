@extends('layouts.agro_layout')

@section('main')
<div class="row">
<div class="panel panel-default">
    @if ( session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="panel-heading">
        Добавление **товара???**
    </div>
    <form action="{{ route('goods.store') }}" method="POST">

        {!! csrf_field() !!}
        <div class="panel-body">
        <div class="form-group{{ $errors->has('g_name') ? ' has-error' : '' }}">
            <label>Наименование товара</label>
            <input type="text" class="form-control" id="quantity" name="g_name" placeholder="" value="{{ old('g_name') }}" required>
            @if($errors->has('g_name'))
                <span class="help-block">{{ $errors->first('g_name') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">
            <label for="barcode">Штрих-код</label>
            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="штрихкод" value="{{ old('barcode') }}">
            @if($errors->has('goods_id'))
                <span class="help-block">{{ $errors->first('barcode') }}</span>
            @endif
        </div>
          
            <div class="form-group{{ $errors->has('сategories_id') ? ' has-error' : '' }}">
              <label>Категория</label>
              <select class="selectpicker form-control" id="сategories_id" name="categories_id" data-live-search="true">
              <?php foreach ($сategories as $row): ?>
                  <option value="{{ $row->id }}">{{ $row->cat_name }}</option> 
              <?php endforeach; ?>      
              </select>
              @if($errors->has('сategories_id'))
                <span class="help-block">{{ $errors->first('сategories_id') }}</span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('manfac_id') ? ' has-error' : '' }}">
              <label>Поставщик</label>
              <select class="selectpicker form-control" id="сategory" name="manfac_id" data-live-search="true">
              <?php foreach ($manfacs as $row): ?>
                  <option value="{{ $row->id }}">{{ $row->manfac_name }}</option> 
              <?php endforeach; ?>      
              </select>
              @if($errors->has('manfac_id'))
                <span class="help-block">{{ $errors->first('manfac_id') }}</span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('measure_id') ? ' has-error' : '' }}">
              <label>Единицы</label>
              <select class="selectpicker form-control" id="сategory" name="measure_id" data-live-search="true">
              <?php foreach ($measures as $row): ?>
                  <option value="{{ $row->id }}">{{ $row->meas_name }}</option> 
              <?php endforeach; ?>      
              </select>
              @if($errors->has('measure_id'))
                <span class="help-block">{{ $errors->first('measure_id') }}</span>
              @endif
            </div>
          
        <div class="form-group{{ $errors->has('rec_price') ? ' has-error' : '' }}">
            <label>Рекомендуемая цена</label>
            <input type="text" class="form-control" id="rec_price" name="rec_price" placeholder="" value="{{ old('rec_price') }}">
            @if($errors->has('rec_price'))
                <span class="help-block">{{ $errors->first('rec_price') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label>Краткое описание</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            @if($errors->has('description'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif
        </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
        
        </form>
</div>
</div>    
@endsection