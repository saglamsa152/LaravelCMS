/**
 * Created by sametatabasch on 17.04.2014.
 */
/**
 * dataTable sınıflı  tablolar DataTeble ile düzenleniyor
 */
$(function () {
	$('.dataTable').dataTable();
});
/**
 * ajaxForm sınıflı  formların işlemini ajax ile yapıyor
 */
$(function () {
	$('.ajaxForm').on('submit', function () {
		//ckeditor deki verilerin textarea ya aktarılıtor
		CKEDITOR.instances.content.updateElement();
		$.ajax({
			type   : 'POST',
			url    : $(this).attr('action'),
			data   : $(this).serializeArray(),
			success: function (returnData) {
				//todo  fadein ve fadeout animasyonu eklenecek
				var cevap = '<ul>';
				if (jQuery.type(returnData['msg']) == "object") {
					$.each(returnData['msg'], function (key, value) {
						cevap +='<li>'+value+'</li>';
					});
					cevap+='</ul>';
				}else cevap=returnData['msg'];
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
});