<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row col-lg-5">
        <h2>Get Request</h2>
        <button class="btn btn-warning" id="getRequest">getRequest</button>
    </div>
    <div class="row col-lg-5">
        <h2>Register</h2>
        <form id="register" action="#">
            {{ csrf_field() }}
            <label for="firstname"></label>
            <input type="text" id='firstname' class="form-control">

            <label for="lastname"></label>
            <input type="text" id='lastname' class="form-control">

            <br>
            <input type="submit" value="Register" class="btn btn-primary">
        </form>
    </div>
</div>
<div id="getRequestData"></div>
    
</body>
</html>
