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
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

<h1>update user</h1>

<br><br>
{{ Form::open([
    "url" => "user/update",
    "method" => "POST",
    "files" => true,
    "class" => "form-register",
]) }}

<table border =1>

{{$showUser->FName}} / 
{{$showUser->Lname}} / 
{{$showUser->userName}} / 
{{$showUser->password}} / 
{{--$showUser->dep--}} <br>


<tr>
	<td>First Name</td>
	<td>{{Form::text('FName',$showUser->FName,
		['placeholder'=>'First Name',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>Last Name</td>
	<td>{{Form::text('Lname',$showUser->Lname,
		['placeholder'=>'Last Name',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>user name {{$showUser->userName}}</td>
	<td>{{$showUser->userName}}{{Form::hidden('userName',$showUser->userName,
		['placeholder'=>'username',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>password({{$showUser->password}})</td>
	<td>{{Form::password('password',Input::old('password'),
		['placeholder'=>'passWord',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>department</td>

	<td>{{Form::select('dep',$dep,$showUser->dep),
		['placeholder'=>'department',
		'class'=>'form-control']
		}}</td>
</tr>
<tr>
	<td>{{ Form::submit('Back',['class' => 'btn','name' => 'submitbutton'])}} 
	    {{ Form::submit('Update', ['class' => 'btn','name' => 'submitbutton'])}} 
	</td>
</tr>

</table>

{{ Form::close() }}







    </body>
</html>
