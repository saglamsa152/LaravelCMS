/**
 * Created by sametatabasch on 19.11.2014.
 */
$(function () {
	var waitingAnimationHtml =
			'<div class="spinner">' +
				'<div class="rect1"></div>' +
				'<div class="rect2"></div>' +
				'<div class="rect3"></div>' +
				'<div class="rect4"></div>' +
				'<div class="rect5"></div>' +
			'</div>';
	var modal =$(
			'<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-hidden="true">' +
				'<div class="modal-dialog modal-sm">' +
					'<div class="modal-content">' +
						'<div class="modal-header">' +
							'<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
							'<h4 class="modal-title" id="ajaxModalLabel"></h4>' +
						'</div>' +
						'<div class="modal-body">' +
						'</div>' +
						'<div class="modal-footer">' +
							'<button id="0" type="button" class="btn btn-default" data-dismiss="modal"></button>'+
							'<button id="1" type="button" class="btn btn-primary"></button>'+
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>');

	var modalHeader = $('.modal-header', modal);
	var modalTitle = $('.modal-title', modalHeader);
	var modalBody = $('.modal-body', modal);
	var modalFooter = $('.modal-footer', modal);
	var modalFooterButton0= $('#0', modalFooter);
	var modalFooterButton1= $('#1', modalFooter);
	/*
	 * AjaxForm sınıflı formları ajax ile çalıştırır
	 */
	$('.ajaxForm').on('submit', function () {

		if (typeof(CKEDITOR) != 'undefined' && $('.ckeditor').length > 0) {//CKEDİTOR tanımlanmış ve sayfada ckeditör aktif edilmişse
			var editorName = $('.ckeditor').attr('name');//ckeditor sınıflı  nesnenin name özelliği
			//ckeditor deki verilerin textarea ya aktar
			CKEDITOR.instances[editorName].updateElement();
		}
		/* waiting animation */
		$('body').append(modal);
		if(typeof($(this).attr('title'))!='undefined'){
			modalTitle.html($(this).attr('title'));
		}else modalHeader.hide();
		modalFooter.hide();
		modalBody.html(waitingAnimationHtml);
		modal.modal('show');
		/* / waiting animation */
		$.ajax({
			type   : 'POST',
			url    : $(this).attr('action'),
			data   : $(this).serializeArray(),
			success: function (returnData) {
				var cevap = '<ul>';
				if (jQuery.type(returnData['msg']) == "object") {
					$.each(returnData['msg'], function (key, value) {
						cevap += '<li>' + key + '-' + value + '</li>';
					});
					cevap += '</ul>';
				} else cevap = returnData['msg'];
				modalBody.addClass('bg-' + returnData['status'] + ' text-' + returnData['status']);
				modalBody.fadeOut(100,function(){
					$(this).html(cevap).fadeIn('slow');
				});
				modalFooter.show();
				modalFooterButton0.hide();
				//modal  kapatıldığında yönlendirme varsa  yönlendir.
				modal.on('hidden.bs.modal', function (e) {
					if (jQuery.type(returnData['redirect']) != 'undefined') {
						window.location.replace(returnData['redirect']);
					}else{
						modalFooter.show();
						modalFooterButton0.show();
						modalBody.removeClass('bg-' + returnData['status'] + ' text-' + returnData['status']);
					}
				});
				// set Ok button
				modalFooterButton1.html(gettext.ok).click(function(){modal.modal('hide')});
			}
		});
		return false;
	});

	$('.ajaxFormPassword').on('submit', function () {
		$('#updatePassword').append('<div id="ajaxResult" class="alert alert-info">' + waitingAnimationHtml + '</div>');
		$.ajax({
			type   : 'POST',
			url    : $(this).attr('action'),
			data   : $(this).serializeArray(),
			success: function (returnData) {
				if (jQuery.type(returnData['msg']) == "object") {
					$('#updatePassword > .overlay').remove();
					$('.ajaxFormPassword label').remove();
					$('.ajaxFormPassword .form-group').removeClass('has-error');
					$.each(returnData['msg'], function (key, value) {
						$('.ajaxFormPassword #' + key).addClass('has-error');
						$('.ajaxFormPassword #' + key).prepend('<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i>' + value + '</label>')
					});
				} else {
					$('#updatePassword > .overlay').html('<span class="glyphicon glyphicon-ok"></span>');
					$('#updatePassword > .overlay').click(function () {
						$(this).remove();
						$('.ajaxFormPassword input').val('');
					});

				}
			}
		});
		return false;
	});

	$('.ajaxFormDelete').on('submit', function () {
		var form = $(this);
		$('body').append(modal);
		//add Title
		modalTitle.html(gettext.confirmDelete);
		//add message
		modalBody.html(gettext.deleteMessage);
		// add yes and no  button
		modalFooterButton0.html(gettext.no);
		modalFooterButton1.html(gettext.yes);
		//if click Ye buton
		modal.modal('show');
		$('#1', modalFooter).click(function (e) {
			modalBody.html(waitingAnimationHtml);
			$.ajax({
				type   : 'POST',
				url    : form.attr('action'),
				data   : form.serializeArray(),
				success: function (returnData) {
					var cevap = '<ul>';
					if (jQuery.type(returnData['msg']) == "object") {
						$.each(returnData['msg'], function (key, value) {
							cevap += '<li>' + key + '-' + value + '</li>';
						});
						cevap += '</ul>';
					} else cevap = returnData['msg'];
					modalBody.addClass('bg-' + returnData['status'] + ' text-' + returnData['status']);
					modalBody.fadeOut(100,function(){
						$(this).html(cevap).fadeIn('slow');
					});
					// hide no Button
					modalFooterButton0.hide();
					//modal  kapatıldığında yönlendirme varsa  yönlendir.
					modal.on('hidden.bs.modal', function (e) {
						if (jQuery.type(returnData['redirect']) != 'undefined') {
							window.location.replace(returnData['redirect']);
						}else{
							modalFooter.show();
							modalFooterButton0.show();
							modalBody.removeClass('bg-' + returnData['status'] + ' text-' + returnData['status']);
						}
					});
					// set Ok button
					modalFooterButton1.html(gettext.ok).click(modal.modal('hide'));
				}
			});
		});
		return false;
	});

	/*
	 * Tablolardaki  toplu  işlemler (Bulk Actions)
	 * Toplu işlemlerin hepsi post olarak sadece id bilgisini yollamalı
	 */

	$('#bulkAction a[data-link]').click(function () {
		var ids = new Array();
		// olayı aktif eden link
		var link = $(this);
		var table = $('#bulkAction').parents('table');
		// tablodaki seçili elemenların id bilgisini ids dizisine aktarıyoruz
		$("input[type='checkbox']", table).each(function (index, e) {
			if (!$(e).is('#check-all')) { //hepsini seçmemize yarıyan checbox ı  atlıyoruz
				if ($(e).parent().hasClass('checked')) //seçilmiş olan checkbox değerlerini ids dizisine aktarıyoruz
					ids.push(e.value)
			}
		});
		if ($.isEmptyObject(ids)) {
			alert('Seçim Yapmadınız');
			return false;
		}
		$('body').append(modal);
		modalTitle.html(link.html());
		if (link.attr('data-action') == 'delete') {
			//add Title
			modalTitle.html(gettext.confirmDelete);
			//add message
			modalBody.html(gettext.deleteMessage);
			// add yes and no  button
			modalFooterButton0.html(gettext.no);
			modalFooterButton1.html(gettext.yes);
			//if click Ye buton
			modal.modal('show');
			modalFooterButton1.click(function (e) {
				modalBody.html(waitingAnimationHtml);
				triggerAjax();
			});
		} else {
			modalFooter.hide();
			modalBody.html(waitingAnimationHtml);
			modal.modal('show');
			triggerAjax();
		}
		/**
		 * ajax işlemini çalıştıran fonsiyon
		 */
		function triggerAjax() {
			var token = $('#bulkAction input[name="_token"]').val();
			$.ajax({
				type   : 'POST',
				url    : link.attr('data-link'),
				data   : {id: ids, '_token': token},
				success: function (returnData) {
					var cevap = '<ul>';
					if (jQuery.type(returnData['msg']) == "object") {
						$.each(returnData['msg'], function (key, value) {
							cevap += '<li>' + key + '-' + value + '</li>';
						});
						cevap += '</ul>';
					} else cevap = returnData['msg'];
					modalBody.addClass('bg-' + returnData['status'] + ' text-' + returnData['status']);
					modalBody.fadeOut(100, function () {
						$(this).html(cevap).fadeIn('slow');
					});
					modalFooter.show();
					modalFooterButton0.hide();
					//modal  kapatıldığında yönlendirme varsa  yönlendir.
					modal.on('hidden.bs.modal', function (e) {
						if (jQuery.type(returnData['redirect']) != 'undefined') {
							window.location.replace(returnData['redirect']);
						}else{
							modalFooter.show();
							modalFooterButton0.show();
							modalBody.removeClass('bg-' + returnData['status'] + ' text-' + returnData['status']);
						}
					});
					// set Ok button
					modalFooterButton1.html(gettext.ok).click(function () {modal.modal('hide');});
				}
			});
		}
	});
})//ready Function