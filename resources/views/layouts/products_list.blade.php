@extends('goods.goods_index')

@section('list')
    <div class="content">
        <ul class="nav">
            @foreach ($goodsCat as $row)
                <li class="nav-item">
                    <a href="{{ route('goods.show', $row->id) }}">{{ $row->cat_name }}</a>
                </li>
            @endforeach

        </ul>
    </div>
@endsection

