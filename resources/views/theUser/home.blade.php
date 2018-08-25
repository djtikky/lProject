<html>
    <body>

	{{ Form::open([
    "url" => "user/add",
    "method" => "POST",
    "files" => true,
    "class" => "form-register",
]) }}

<table border =1>
<tr>
	<td>First Name</td>
	<td>{{Form::text('FName',Input::old('FName'),
		['placeholder'=>'First Name',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>Last Name</td>
	<td>{{Form::text('Lname',Input::old('Lname'),
		['placeholder'=>'Last Name',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>user</td>
	<td>{{Form::text('userName',Input::old('userName'),
		['placeholder'=>'username',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>password</td>
	<td>{{Form::password('password',Input::old('password'),
		['placeholder'=>'passWord',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}</td>
</tr>
<tr>
	<td>{{ Form::submit('Create', ['class' => 'btn']) }}</td>
</tr>
</table>
{{ Form::close() }}

        <h1>Hello,  in View</h1>
home insert update delete

<table border =1>
	<tr><td>First Name</td><td>Last Name</td><td>username</td><td>password</td></tr>		
	@foreach($theUser as $key=>$row)
	<tr>
	    <td> {{$row->FName}}</td>
		<td> {{$row->Lname}} </td>
		<td> {{$row->userName}}</td>
		<td> {{$row->password}}</td>
	 </tr>
	@endforeach
</table>

		
    </body>
</html>

