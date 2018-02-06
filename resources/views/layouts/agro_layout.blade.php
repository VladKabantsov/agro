@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar">
          <ul class="nav">
<!--            <li class="nav-item">-->
<!--              <a class="nav-link" href="{{ route('goods.index') }}">Товары</a>-->
<!--            </li>-->
              <li>
                  <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" href="{{ route('goods.index') }}">
                          Товары
                          <i class="icon icon-caret-right"></i>
                      </a>
                      <ul class="dropdown-menu" style="top:0; left: 100%;">
                              <li><a href="{{ route('goods.index') }}">Choice1</a></li>
                              <li><a href="{{ route('goods.index') }}">Choice2</a></li>
                              <li><a href="{{ route('goods.index') }}">Choice3</a></li>
                              <li><a href="{{ route('goods.index') }}">Choice4</a></li>
                              <li><a href="{{ route('goods.index') }}">Choice5</a></li>
                              <li><a href="{{ route('goods.index') }}">Choice6</a></li>
                      </ul>
                  </div>
              </li>
              <li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.index') }}">Пользователи</a>
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
<!--            <li class="nav-item">-->
<!--              <a class="nav-link" href="/adduser">Добавить пользователя</a>-->
<!--            </li>-->

          </ul>
            
         </nav>
        
        <main class="col-sm-9">
            @yield('main')
        </main>
    </div>
</div>    

@endsection
