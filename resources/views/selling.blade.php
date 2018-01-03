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
        <h1>Добавление цены</h1>    
            <form action="/price" method="POST">
                
              {!! csrf_field() !!}
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="goods_id">goods_id</label>
                <input type="text" class="form-control" id="goods_id" name="goods_id" placeholder="goods_id" value="{{ old('goods_id') }}">
                @if($errors->has('goods_id'))
                    <span class="help-block">{{ $errors->first('goods_id') }}</span>
                @endif
              </div>
              
              <div class="form-group{{ $errors->has('sprice') ? ' has-error' : '' }}">
                <label for="sprice">price</label>
                <input type="text" class="form-control" id="sprice" name="sprice" placeholder="price" value="{{ old('sprice') }}">
                @if($errors->has('price'))
                    <span class="help-block">{{ $errors->first('sprice') }}</span>
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
                   <th width="15%">price</th>  
                   <th width="15%">date</th>  
                   <th width="10%">user_id</th>  
              </tr>
              @foreach ($sellings as $selling)
              <tr>
                   <td>{{ $selling->id }}</td>
                   <td>{{ $selling->goods_id }}</td>
                   <td>{{ $selling->sprice }}</td>
                   <td>{{ $selling->date }}</td>
                   <td>{{ $selling->user_id }}</td>
              </tr>     
              @endforeach
            </table>  
        </div>
    </body>
</html>
