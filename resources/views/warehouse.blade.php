<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    
    </head>
    <body>

        <div class="container">
        <div class="row">  
        <h1>Заполнение склада</h1>    
            <form action="/warehouse" method="POST">
                
              {!! csrf_field() !!}
              <div class="form-group{{ $errors->has('goods_id') ? ' has-error' : '' }}">
                <label for="goods_id">goods_id</label>
                <input type="text" class="form-control" id="goods_id" name="goods_id" placeholder="goods_id" value="{{ old('goods_id') }}">
                @if($errors->has('goods_id'))
                    <span class="help-block">{{ $errors->first('goods_id') }}</span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                <label for="quantity">quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
                @if($errors->has('quantity'))
                    <span class="help-block">{{ $errors->first('quantity') }}</span>
                @endif
              </div>
              
              <button type="submit" class="btn btn-primary">Добавить</button>
              
            </form>
        </div>    
            <br/><hr>
            <table class="table table-bordered">  
              <tr>  
                   <th width="25%">goods_id</th>  
                   <th width="25%">remaining</th>  
                   <th width="25%">price</th>
                   <th width="25%">*</th>
              </tr>
              @foreach ($goods as $one)
              <tr>
                   <td>{{ $one->goods_id }}</td>
                   <td>{{ $one->rem_goods }}</td>
                   <td>{{ $one->sprice }}</td>
                   <td>
                       <form action="#" method="GET">
                           {!! csrf_field() !!}
                           <button type="submit" class="btn btn-primary">Продать</button>    
                       </form>
                   </td>
              </tr>     
              @endforeach
            </table>  
        </div>
    </body>
</html>


