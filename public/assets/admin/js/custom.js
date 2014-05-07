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
		$.ajax({
			type   : 'POST',
			url    : $(this).attr('action'),
			data   : $(this).serializeArray(),
			success: function (returnData) {
				//todo  fadein ve fadeout animasyonu eklenecek
				var cevap = '<ul>';
				if (jQuery.type(returnData['msg']) == "object") {
					$.each(returnData['msg'], function (key, value) {
						cevap += '<li>' + key + '-' + value + '</li>';
					});
					cevap += '</ul>';
				} else cevap = returnData['msg'];
				$('body').append(
						'<div id="ajaxResult" class="alert alert-' + returnData['status'] + ' alert-dismissable">' +
								'<i class="fa fa-check"></i>' +
								'<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>' +
								'' + cevap +
								'</div>'
				);
				$('#ajaxResult').css({
					'left': (window.innerWidth - jQuery('#ajaxResult').width()) / 2,
					'top' : (window.innerHeight - jQuery('#ajaxResult').height()) / 2
				});
			}
		});
		return false;
	});

	/**
	 *  data-mask özelliği olan nesneye input mask uygular
	 */
	$("[data-mask]").inputmask();

});//ready function