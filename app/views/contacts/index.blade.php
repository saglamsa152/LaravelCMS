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
						<h2 class="under"><cufon class="cufon cufon-canvas" alt="Contact " style="width: 119px; height: 40px;"><canvas width="154" height="48" style="width: 154px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Contact </cufontext></cufon><cufon class="cufon cufon-canvas" alt="form" style="width: 68px; height: 40px;"><canvas width="84" height="48" style="width: 84px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>form</cufontext></cufon></h2>
						{{ Form::open(array('url' => '','id' =>'ContactForm')) }}
							<div>
								<div class="wrapper">
									<span>{{ Form::label('name','Your Name:') }}</span>
									{{ Form::text('name','',array('class'=>'input')) }}
								</div>
								<div class="wrapper">
									<span>{{ Form::label('city','Your City:') }}</span>
									{{ Form::text('city','',array('class'=>'input')) }}
								</div>
								<div class="wrapper">
									<span>{{ Form::label('email','Your E-mail:') }}</span>
									{{ Form::text('email','',array('class'=>'input')) }}
								</div>
								<div class="textarea_box">
									<span>{{ Form::label('message','Your Message:') }}</span>
									{{ Form::textarea('message','',array('cols' => '1','rows' => '1')) }}
								</div>
								{{ HTML::link('#','Send',array('onclick'=>"document.getElementById('ContactForm').submit()")) }}
								{{ HTML::link('#','Clear',array('onclick'=>"document.getElementById('ContactForm').reset()")) }}
							</div>
						{{ Form::close() }}
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h2 class="under"><cufon class="cufon cufon-canvas" alt="Contacts" style="width: 126px; height: 40px;"><canvas width="154" height="48" style="width: 154px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Contacts</cufontext></cufon></h2>
						<div id="address"><span>Country:<br>
								City:<br>
								Telephone:<br>
								Email:</span>
							USA<br>
							San Diego<br>
							+354 5635600<br>
							<a class="color2" href="mailto:">elenwhite@mail.com</a></div>
						<h2 class="under"><cufon class="cufon cufon-canvas" alt="Miscellaneous" style="width: 204px; height: 40px;"><canvas width="231" height="48" style="width: 231px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Miscellaneous</cufontext></cufon></h2>
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium volupta- tum deleniti atque corrupti quos dolores et quas molestias excep- turi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum.</p>
					</div>
				</section>
			</div>

		</article>
	</div>
</div>
@stop
