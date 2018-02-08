@extends('layouts.agro_layout')

@section('main')
<div class="container">
    <div class="row">
        <h1>Hello Vendor</h1>
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
                                    <a class="subcat active" href="{{ route('goods.show', $row->id) }}">
                                        {{ $row->subcategories_name }}
                                    </a>
                                    @else
                                    <a class="subcat" href="{{ route('goods.show', $row->id) }}">
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
        <div class="panel-body col-md-10">

        </div>
    </div>
</div>

@endsection
