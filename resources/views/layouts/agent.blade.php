@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Agent</h1>
        {{--<div class="col-md-2">--}}
            {{--<div class="content">--}}
                {{--<ul id="list" class="nav">--}}
                    {{--@foreach ($goodsCat as $cat)--}}
                    {{--<li class="nav-item li-item">--}}
                        {{--<a href="#" class="cat">--}}
                            {{--{{ $cat->cat_name }}--}}
                            {{--<ul class="nav">--}}
                                {{--@foreach ($goodsSubCat as $row)--}}
                                {{--<li class="nav-item">--}}
                                    {{--@if ($cat->id==$row->category_id)--}}
                                    {{--@if ($row->id==$idActiveSubCategory)--}}
                                    {{--<a class="subcat active" href="">--}}
                                        {{--{{ $row->subcategories_name }}--}}
                                    {{--</a>--}}
                                    {{--@else--}}
                                    {{--<a class="subcat" href="">--}}
                                        {{--{{ $row->subcategories_name }}--}}
                                    {{--</a>--}}
                                    {{--@endif--}}
                                    {{--@endif--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        @include('treeMenu')
        <div class="panel-body col-md-7">
            <div class="container-fluid">
                <div class="input-error"></div>

                <div class="ui-widget">
                    <label>Товар: </label>
                    <input id="tags">
                    <label>Кол-во: </label>
                    <input pattern="[ 0-9]+$" id="goods-number">
                    <a class="btn btn-primary btn-add" >
                        Добавить
                    </a>
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
