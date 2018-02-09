@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Vendor</h1>
        <div class="col-md-2">
            <div class="content">
                <ul id="list" class="nav">
                    @foreach ($goodsCat as $cat)
                    <li class="nav-item">
                        <a href="#" class="cat">
                            {{ $cat->cat_name }}
                            <ul class="nav">
                                @foreach ($goodsSubCat as $row)
                                <li class="nav-item">
                                    @if ($cat->id==$row->category_id)
                                        @if ($row->id==$idActiveSubCategory)
                                            <a class="subcat active" href="">
                                                {{ $row->subcategories_name }}
                                            </a>
                                        @else
                                            <a class="subcat" href="">
                                                {{ $row->subcategories_name }}
                                            </a>
                                        @endif
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="panel-body col-md-8">
            <div class="container-fluid">
                <div class="ui-widget">
                    <label for="tags">Товар: </label>
                    <input id="tags">
                    <label>Кол-во: </label>
                    <input pattern="[ 0-9]+$" id="goods-number">
                    <a class="btn btn-primary " id="btn-add">
                        Добавить
                    </a>
                </div>
                <div class="panel-body col-md-10">
                    <table class="table table-bordered table-striped" id="users-table">
                        <thead>
                        <tr>
                            <th width="15%">Имя</th>
                            <th width="10%">Код</th>
                            <th width="10%">Кат-ия</th>
                            <th width="10%">Подкат-ия</th>
                            <th width="10%">Про-ль</th>
                            <th width="5%">Мера</th>
                            <th width="10%">Цена</th>
                            <th width="10%">Кол-во</th>
                            <th width="10%">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($goods as $one)
                            <tr>
                                <td>{{ $one->g_name }}</td>
                                <td>{{ $one->barcode }}</td>
                                <td>{{ $one->cat_name }}</td>
                                <td>{{ $one->subcategories_name }}</td>
                                <td>{{ $one->manfac_name }}</td>
                                <td>{{ $one->meas_name }}</td>
                                <td>{{ $one->rec_price }}</td>
                                <td>{{ $one->quantity }}</td>
                                <td>
                                    <a class="btn btn-primary pull-right" id="btn-add">
                                        Добавить
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2 check-list">

        </div>
    </div>
</div>

@endsection
