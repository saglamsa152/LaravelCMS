<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 21.02.2014
 * Time: 22:41
 */

?>
<div class="wrapper row">
	<div class="slider">
		<div class="rslides_container">
			<ul class="rslides" id="slider">
				@foreach($slides as $slide)
				<li><a href="{{$slide->url}}"><img src="{{URL::asset($slide->postMeta()->where('metaKey', '=', 'image')->first()->metaValue)}}" alt=""></a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>