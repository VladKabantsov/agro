@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel-body col-xs-4">
            <form action="{{ $route }}" class="" method="POST">
                {{ csrf_field() }}

                <input type="hidden" value="{{ $id }}" name="id">
                <input type="hidden" size="40" name="goodsName" value="{{ $name }}">
                <h1>{{ $name }}</h1>
                <label for="goodsPrice">Price</label>
                <input type="text" class="form-control" id="goodsPrice" name="goodsPrice" value="{{ $price }}">

                <button type="submit" class="btn btn-success editPrice" >Подтвердить</button>
            </form>

        </div>
    </div>
</div>

@endsection
