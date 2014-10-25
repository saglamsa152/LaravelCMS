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

	/**
	 * TinyMCE tinymce sınıflı  textarea üzerine yerleşecek
	 */
	tinymce.init({
		selector: "textarea.tinymce",
		menubar : false,
		language : 'tr_TR',
		theme: "modern",
		plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
			"table contextmenu directionality emoticons paste textcolor responsivefilemanager",
			"code spellchecker"
		],
		toolbar1: "|  preview code undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | responsivefilemanager | image media",
		toolbar2: "| link unlink anchor  | forecolor backcolor  | hr link image charmap paste copy cut pagebreak searchreplace | insertdatetime table ltr rtl",
		image_advtab: true ,
		external_filemanager_path:"/assets/admin/js/plugins/ResponsiveFilemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "/assets/admin/js/plugins/ResponsiveFilemanager/filemanager/plugin.min.js"}


	});

});//ready function