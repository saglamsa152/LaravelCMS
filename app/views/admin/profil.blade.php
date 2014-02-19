@include('admin.header')
<div class="row-fluid sortable ui-sortable">
	<div class="box span12" style="">
		<div data-original-title="" class="box-header well">
			<h2><i class="icon-th"></i> {{$user->username}}</h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">
				{{Form::model($user,array('class'=>'form-horizontal'))}}
					<fieldset>
						<legend>{{$user->username}}</legend>
						<div class="control-group">
							{{Form::label('name','Name',array('class'=>'control-label'))}}
							<div class="controls">
								{{Form::text('name',$user->name,array('class'=>'input-medium'))}}
							</div>
						</div>
					</fieldset>
				{{Form::close()}}
			</div>
		</div>
	</div>
	<!--/span-->
</div>
@include('admin.footer')