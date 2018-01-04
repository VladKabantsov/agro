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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    
    </head>
    <body>

        <div class="container">
        <div class="row">  
        <h2>Добавление товара</h2>    
            <form action="/order" method="POST">
                
              {!! csrf_field() !!}
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
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
              <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price">price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="price" value="{{ old('price') }}">
                @if($errors->has('price'))
                    <span class="help-block">{{ $errors->first('price') }}</span>
                @endif
              </div>
              <button type="submit" class="btn btn-primary">Добавить</button>
              
            </form>
        </div>    
            <br/><hr>
            <table class="table table-bordered">  
              <tr>  
                   <th width="10%">id</th>  
                   <th width="10%">goods_id</th>  
                   <th width="15%">quantity</th>  
                   <th width="15%">remaining</th>  
                   <th width="15%">price</th>  
                   <th width="15%">date</th>  
                   <th width="10%">user_id</th>  
              </tr>
              @foreach ($orders as $order)
              <tr>
                   <td>{{ $order->id }}</td>
                   <td>{{ $order->goods_id }}</td>
                   <td>{{ $order->quantity }}</td>
                   <td>{{ $order->rem_goods }}</td>
                   <td>{{ $order->price }}</td>
                   <td>{{ $order->date }}</td>
                   <td>{{ $order->user_id }}</td>
              </tr>     
              @endforeach
            </table>  
        </div>
    </body>
</html>
