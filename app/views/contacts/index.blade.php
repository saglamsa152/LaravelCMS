@extends('template.default')
@section('header')
<div class="body1">
	<div class="body2">
		<div class="body5">
			<div class="main zerogrid">
				<!-- header -->
				<header>
					@include('template.menu')
				</header>
				<!-- header end-->
			</div>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="body3">
	<div class="main zerogrid">
		<!-- content -->
		<article id="content">
			<div class="wrapper row">
				<section class="col-3-4">
					<div class="wrap-col">
						<h2 class="under"><?php echo _('Contact Form')?></h2>
						{{ Form::open(array('url' => '','id' =>'ContactForm')) }}<!--todo form çalışır hale gelecek-->
						<div>
							<div class="wrapper">
								<span>{{ Form::label('name',_('Your Name:')) }}</span>
								{{ Form::text('name','',array('class'=>'input')) }}
							</div>
							<div class="wrapper">
								<span>{{ Form::label('city',_('Your City:')) }}</span>
								{{ Form::text('city','',array('class'=>'input')) }}
							</div>
							<div class="wrapper">
								<span>{{ Form::label('email',_('Your E-mail:')) }}</span>
								{{ Form::text('email','',array('class'=>'input')) }}
							</div>
							<div class="textarea_box">
								<span>{{ Form::label('message',_('Your Message:')) }}</span>
								{{ Form::textarea('message','',array('cols' => '1','rows' => '1')) }}
							</div>
							{{ HTML::link('#',_('Send'),array('onclick'=>"document.getElementById('ContactForm').submit()")) }}
							{{ HTML::link('#',_('Clear'),array('onclick'=>"document.getElementById('ContactForm').reset()")) }}
						</div>
						{{ Form::close() }}
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h2 class="under"><?php echo _('Contacts')?></h2>

						<div id="address">
							<span><?php echo _('Country:')?><br>
								<?php echo _('City:')?><br>
								<?php echo _('Telephone:')?><br>
								<?php echo _('Email:')?></span>
							USA<br>
							San Diego<br>
							+354 5635600<br>
							<a class="color2" href="mailto:">elenwhite@mail.com</a></div>
						<h2 class="under"><?php echo _('Miscellaneous')?></h2>
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium volupta- tum deleniti atque corrupti quos dolores et quas molestias excep- turi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum.</p>
					</div>
				</section>
			</div>

		</article>
	</div>
</div>
@stop
