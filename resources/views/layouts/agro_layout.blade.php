@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('goods.index') }}">Товары</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('order.index')}}">Заказы</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('price.index')}}">Цены</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Справочники</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/warehouse">Продажи</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logs">Касса</a>
            </li>
          </ul>
            
         </nav>
        
        <main class="col-sm-9">
            @yield('main')
        </main>
    </div>
</div>    

@endsection
