@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/order">Заказы</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Цены</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Справочники</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Продажи</a>
            </li>
          </ul>
         </nav>
        
        <main class="col-sm-9">
            @yield('main')
        </main>
    </div>
</div>    

@endsection
