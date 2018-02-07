@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <nav class="col-sm-12 col-md-12 bg-light">
          <ul class="nav nav-tabs">
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('goods.index') }}">Товары</a>
            </li>
            <li class="nav-item ">
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
        

    </div>
    <div class="row">
        <main class="col-sm-12">
            @yield('main')
        </main>
    </div>

</div>    

@endsection
