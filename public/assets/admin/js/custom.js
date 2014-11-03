/**
 * Created by sametatabasch on 17.04.2014.
 */

$(function () {
	/**
	 * dataTable sınıflı  tablolar DataTeble ile düzenleniyor
	 */
	$('.dataTable').dataTable();

	/**
	 * ajaxForm sınıflı  formların işlemini ajax ile yapıyor
	 */

	$('.ajaxForm').on('submit', function () {

		if (typeof(CKEDITOR) != 'undefined' && $('.ckeditor').length > 0) {//CKEDİTOR tanımlanmış ve sayfada ckeditör aktif edilmişse
			var editorName = $('.ckeditor').attr('name');//ckeditor sınıflı  nesnenin name özelliği
			//ckeditor deki verilerin textarea ya aktar
			CKEDITOR.instances[editorName].updateElement();
		}
		/* waiting animation */
		$('body').fadeIn('slow', function () {
			$(this).append(
					'<div id="ajaxResult" class="alert alert-info">' +
					'<div class="spinner">' +
					'<div class="rect1"></div>' +
					'<div class="rect2"></div>' +
					'<div class="rect3"></div>' +
					'<div class="rect4"></div>' +
					'<div class="rect5"></div>' +
					'</div>' +
					'</div>'
			);
		});
		$('#ajaxResult').css({
			'left': (window.innerWidth - jQuery('#ajaxResult').width()) / 2,
			'top' : (window.innerHeight - jQuery('#ajaxResult').height()) / 2
		});
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
				$('#ajaxResult').fadeOut('slow', function () {
					$(this).removeClass('alert-info').addClass(' alert-' + returnData['status'] + ' alert-dismissable');
					$(this).html(
							'<i class="fa fa-check"></i>' +
							'<button aria-hidden="true"  class="close" type="button">×</button>' +
							'' + cevap + ''
					).css({
								'left': (window.innerWidth - $(this).width()) / 2,
								'top' : (window.innerHeight - $(this).height()) / 2
							});
					// fadeout effect on click close button
					$(this).children('.close').click(function () {
						$(this).parent().fadeOut('slow', function () {
							$(this).remove()
							if (jQuery.type(returnData['redirect'] != 'undefined')) {
								window.location.replace(returnData['redirect']);
							}
						});
					});
				});
				$('#ajaxResult').fadeIn('slow');


			}
		});
		return false;
	});
	$('.ajaxFormPassword').on('submit', function () {
		$('#updatePassword').append('<div class="overlay">' +
		'<div class="spinner">' +
		'<div class="rect1"></div>' +
		'<div class="rect2"></div>' +
		'<div class="rect3"></div>' +
		'<div class="rect4"></div>' +
		'<div class="rect5"></div>' +
		'</div>' +
		'</div>');
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

	/**
	 *  data-mask özelliği olan nesneye input mask uygular
	 */
	$("[data-mask]").inputmask();

	/**
	 * TinyMCE tinymce sınıflı  textarea üzerine yerleşecek
	 */
	tinymce.init({
		selector                 : "textarea.tinymce",
		menubar                  : false,
		language                 : 'tr_TR',
		theme                    : "modern",
		plugins                  : [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
			"table contextmenu directionality emoticons paste textcolor responsivefilemanager",
			"code spellchecker"
		],
		toolbar1                 : "|  preview code undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | responsivefilemanager | image media",
		toolbar2                 : "| link unlink anchor  | forecolor backcolor  | hr link image charmap paste copy cut pagebreak searchreplace | insertdatetime table ltr rtl",
		image_advtab             : true,
		external_filemanager_path: "/assets/admin/js/plugins/ResponsiveFilemanager/filemanager/",
		filemanager_title        : "Responsive Filemanager",
		external_plugins         : {"filemanager": "/assets/admin/js/plugins/ResponsiveFilemanager/filemanager/plugin.min.js"}


	});
	/**
	 * şehir seçildiğinde otomatik olark ilçe listesini getirmek için
	 */
	$("select[name='meta[city]']").change(function () {
		$.post('http://www.ilklaravel.loc/admin/options/counties', {city_id: this.value}, function (counties) {
			out = '';
			$.each(counties, function (key, value) {
				out += '<option value="' + key + '">' + value + '</option>';
			});
			$("select[name='meta[county]'] option").remove();
			$("select[name='meta[county]'] ").append(out);
		});
	});

});//ready function