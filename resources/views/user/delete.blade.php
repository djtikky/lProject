{{ Form::open([
    "url" => "user/delete",
    "method" => "POST",
    "files" => true,
    "class" => "form-register",
]) }}

do you want to delete this user <br>
<h3>{{$showUser->userName}} : {{$showUser->FName}} {{$showUser->Lname}}</h3>
{{$showUser->depFK()->get()->first()->depName}}<br>

{{Form::hidden('userName',$showUser->userName,
		['placeholder'=>'username',
		'class'=>'form-control',
		'maxlength'=>100]
		)}}
	<td>{{ Form::submit('Back',['class' => 'btn','name' => 'submitbutton'])}} 
	    {{ Form::submit('Delete', ['class' => 'btn','name' => 'submitbutton'])}} 
	</td>
{{ Form::close() }}