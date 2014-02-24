@include('admin.header')
@if(Auth::check())
{{Redirect::action('AdminController@getIndex')}}
@endif
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
				'action' => 'AdminController@postLogin'
			))
		}}
		<fieldset>
			<div class="input-prepend" title="Username" data-rel="tooltip">
				<span class="add-on"><i class="icon-user"></i></span>{{Form::text('username',Input::old('username'),array('class'=>'input-large','autofocus','id'=>'username','placeholder'=>_('Username')))}}
			</div>
			<div class="clearfix"></div>

			<div class="input-prepend" title="Password" data-rel="tooltip">
				<span class="add-on"><i class="icon-lock"></i></span>{{Form::password('password',array('class'=>'input-large','id'=>'password','placeholder'=>'Password'))}}
			</div>
			<div class="clearfix"></div>

			<div class="input-prepend">
				<label class="remember" for="remember">{{Form::checkbox('remember')}}{{_('Remember me')}}</label>
			</div>
			<div class="clearfix"></div>

			<div class="center">
				<div id="register-btn" class="input-prepend span6"><a href="{{URL::action('AdminController@getRegister')}}">{{Form::button(_('Register'),array('class'=>'btn btn-primary'))}}</a></div>
				<div class="input-prepend span6">{{Form::submit(_('Login'),array('class'=>'btn btn-success'))}}</div>
			</div>

		</fieldset>
		{{Form::close()}}
	</div>
	<!--/span-->
</div><!--/row-->
@include('admin.footer')