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
        {{ $title }}
    </div>
    <form action="{{ $route }}" method="POST">

        {!! csrf_field() !!}
        <div class="panel-body">
        <div class="form-group{{ $errors->has('g_name') ? ' has-error' : '' }}">
            <label>Наименование товара</label>
            <input type="text" class="form-control" id="quantity" name="g_name" placeholder="" value="{{ $good[0]->g_name }}" required>
            @if($errors->has('g_name'))
                <span class="help-block">{{ $errors->first('g_name') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">
            <label for="barcode">Штрих-код</label>
            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="штрихкод" value="{{ $good[0]->barcode }}">
            @if($errors->has('goods_id'))
                <span class="help-block">{{ $errors->first('barcode') }}</span>
            @endif
        </div>
          
            <div class="form-group{{ $errors->has('сategories_id') ? ' has-error' : '' }}">
              <label>Категория</label>
              <select class="selectpicker form-control" id="сategories_id" name="categories_id" data-live-search="true">
              <?php foreach ($сategories as $row): ?>
                  @if ( $row->id == $good[0]->categories_id )
                    <option value="{{ $row->id }}" selected>{{ $row->cat_name }}</option>
                  @else
                    <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                  @endif
              <?php endforeach; ?>
              </select>
              @if($errors->has('сategories_id'))
                <span class="help-block">{{ $errors->first('сategories_id') }}</span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('subсategories_id') ? ' has-error' : '' }}">
              <label>Подкатегория</label>
              <select class="selectpicker form-control" id="subсategories_id" name="subcategories_id" data-live-search="true">
              <?php foreach ($subcategories as $row): ?>
                  @if ( $row->id == $good[0]->subcategories_id )
                    <option value="{{ $row->id }}" selected>{{ $row->subcategories_name }}</option>
                  @else
                    <option value="{{ $row->id }}">{{ $row->subcategories_name }}</option>
                  @endif
              <?php endforeach; ?>
              </select>
              @if($errors->has('subcategories_id'))
                <span class="help-block">{{ $errors->first('subcategories_id') }}</span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('manfac_id') ? ' has-error' : '' }}">
              <label>Поставщик</label>
              <select class="selectpicker form-control" id="сategory" name="manfac_id" data-live-search="true">
              <?php foreach ($manfacs as $row): ?>
                  @if ( $row->id == $good[0]->manfac_id )
                    <option value="{{ $row->id }}" selected>{{ $row->manfac_name }}</option>
                  @else
                    <option value="{{ $row->id }}">{{ $row->manfac_name }}</option>
                  @endif
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
                  @if ( $row->id == $good[0]->measure_id )
                    <option value="{{ $row->id }}" selected>{{ $row->meas_name }}</option>
                  @else
                    <option value="{{ $row->id }}">{{ $row->meas_name }}</option>
                  @endif
              <?php endforeach; ?>      
              </select>
              @if($errors->has('measure_id'))
                <span class="help-block">{{ $errors->first('measure_id') }}</span>
              @endif
            </div>
          
        <div class="form-group{{ $errors->has('rec_price') ? ' has-error' : '' }}">
            <label>Цена продажи</label>
            <input type="text" class="form-control" id="rec_price" name="rec_price" placeholder="" value="{{ $good[0]->rec_price }}">
            @if($errors->has('rec_price'))
                <span class="help-block">{{ $errors->first('rec_price') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('rec_price') ? ' has-error' : '' }}">
            <label>Цена закупки</label>
            <input type="text" class="form-control" id="price_purchase" name="price_purchase" placeholder="" value="{{ $good[0]->price_purchase }}">
            @if($errors->has('price_purchase'))
                <span class="help-block">{{ $errors->first('price_purchase') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label>Краткое описание</label>
            <textarea class="form-control" id="description" name="description">{{ $good[0]->description }}</textarea>
            @if($errors->has('description'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif
        </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary" >Сохранить</button>
        </div>
        
        </form>
</div>
</div>    
@endsection