@include('admin.header')
<div class="row-fluid">
	<div class="span12 center login-header">
		<h2>Welcome to Charisma</h2>
	</div>
	<!--/span-->
</div><!--/row-->

<div class="row-fluid">
	<div class="well span4 center login-box">
		@if($errors->count() >0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		{{
		Form::open(array(
		'role'   => 'form',
		'class'  => 'form-horizontal',
		'method' => 'post',
		'route' => 'register'
		))
		}}
		<fieldset>
			<div class="input-prepend" title="E-mail" data-rel="tooltip">
				<span class="add-on"><i class="icon-globe"></i></span>{{Form::text('email',Input::old('email'),array('class'=>'input-large','autofocus','id'=>'email','placeholder'=>'E-mail'))}}
			</div>
			<div class="clearfix"></div>
			<div class="input-prepend" title="Username" data-rel="tooltip">
				<span class="add-on"><i class="icon-user"></i></span>{{Form::text('username',Input::old('username'),array('class'=>'input-large','id'=>'username','placeholder'=>'Username'))}}
			</div>
			<div class="clearfix"></div>

			<div class="input-prepend" title="Password" data-rel="tooltip">
				<span class="add-on"><i class="icon-lock"></i></span>{{Form::password('password',array('class'=>'input-large','id'=>'password','placeholder'=>'Password'))}}
			</div>
			<div class="clearfix"></div>

			<div class="input-prepend" title="Password Confirm" data-rel="tooltip">
				<span class="add-on"><i class="icon-lock"></i></span>{{Form::password('password_confirmation',array('class'=>'input-large','id'=>'password_confirmation','placeholder'=>'Password Confirm'))}}
			</div>
			<div class="clearfix"></div>

			<p class="center span5">
				{{Form::submit('Register',array('class'=>'btn btn-primary'))}}
			</p>
		</fieldset>
		{{Form::close()}}
	</div>
	<!--/span-->
</div><!--/row-->
@include('admin.footer')