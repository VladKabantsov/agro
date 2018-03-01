@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Agent</h1>
        @include('treeMenu')
        <div class="panel-body col-md-7">
            <div class="container-fluid">
                <div class="input-error"></div>

                <div class="ui-widget row">
                    <div class="col-xs-6">
                        <label for="tags">Товар: </label>
                        <input class="form-control" id="tags" name="tags">
                    </div>
                    <div class="col-xs-6">
                        <label for="goods-number">Кол-во: </label>
                        <input class="form-control" pattern="[ 0-9]+$" id="goods-number" name="goods-number">
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-primary btn-add pull-right" >Добавить</a>
                </div>
                <div class="panel-body col-md-8">
                    <table class="table table-bordered table-striped" id="users-table">
                        <thead>
                        <tr>
                            <th width="15%">Имя</th>
                            <th width="10%">Код</th>
                            <th width="10%">Кат-ия</th>
                            <th width="10%">Подкат-ия</th>
                            <th width="10%">Про-ль</th>
                            <th width="15%">Ед. измерения</th>
                            <th width="10%">Цена</th>
                            <th width="10%">Кол-во</th>
                            <th width="10%">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($goods as $key=>$one)
                        <tr>
                            <td>{{ $one->g_name }}</td>
                            <td>{{ $one->barcode }}</td>
                            <td>{{ $one->cat_name }}</td>
                            <td>{{ $one->subcategories_name }}</td>
                            <td>{{ $one->manfac_name }}</td>
                            <td>{{ $one->meas_name }}</td>
                            <td>{{ $one->price_purchase }}</td>
                            <td>{{ $one->quantity }}</td>
                            <td>
                                <a href="{{ route('agentEdit', [
                                      'id'      => $one->id,
                                      'name'    => $one->g_name,
                                      'price'   => $one->price_purchase,
                                ]) }}" class="btn btn-primary pull-right" id="{{ $one->id }}">
                                    Изменить
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $goods->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-3 check-list">
            <div id="ajaxResponseAgent" >Чек подтвержден!</div>
            <table class="table">
                <thead>
                <th>Наим.</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Удал.</th>
                </thead>
                <tbody class="list-of-goods">

                </tbody>
            </table>
            <p class="inline">
                <label>Итог: </label>
                <span id="amount" class="pull-right"><span class="grn pull-right">грн</span></span>

            </p>
            <a class="btn btn-success confirm">Подтвердить</a>
        </div>
    </div>
</div>

@endsection
