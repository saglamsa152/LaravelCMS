@include('admin.header')
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}"><?php echo _('Home')?></a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getContacts')}}"><?php echo _('Contacts')?></a>
		</li>
	</ul>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> <?php echo _('Contacts')?></h2>
		</div>
		<div class="box-content">
			<table class="table table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Id</th>
					<th><?php echo _('Sender\'s Name')?></th>
					<th><?php echo _('Sender\'s E-mail')?></th>
					<th><?php echo _('Send Date')?></th>
					<th><?php echo _('Message')?></th>
					<th><?php echo _('Actions')?></th>
				</tr>
				</thead>
				<tbody>

				@foreach($contacts as $contact)
				<?php $contact->meta=unserialize($contact->meta);?>
				<tr @if($contact->isRead) class="isRead" @endif>
					<td>{{$contact->id}}</td>
					<td>{{$contact->meta['name']}}</td>
					<td>{{$contact->meta['email']}}</td>
					<td class="center">{{$contact->created_at}}</td>
					<td class="center">{{$contact->message}}</td>
					<td class="center">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-large dropdown-toggle"><?php echo _('Actions')?> <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::action('AdminController@getMarkAsReadContact',$contact->id)}}">
										<i class="icon-ok"></i>
										@if($contact->isRead) {{_('Mark as unread')}} @else {{_('Mark as read')}} @endif
									</a>
								</li>
								<li><a href="#">
										<i class="icon-edit"></i>
										<?php echo _('Answer')?>
									</a></li>
								<li>
									<a href="<?= URL::action( 'AdminController@getDeletePost', $contact->id ) ?>">
										<i class="icon-trash"></i>
										<?php echo _( 'Delete' ) ?>
									</a></li>
							</ul>
						</div>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<!--/span-->

</div><!--/row-->
@include('admin.footer')
