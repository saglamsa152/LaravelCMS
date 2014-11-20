/**
 * Created by sametatabasch on 17.04.2014.
 */

$(function () {
	/**
	 * dataTable sınıflı  tablolar DataTeble ile düzenleniyor
	 */
	if ($.isFunction($.fn.dataTable)) {
		$('.dataTable').dataTable();
	}
	/**
	 * ajaxForm sınıflı  formların işlemini ajax ile yapıyor
	 */

  //Şifre değiştirme kutusu sayfa yüklendiğinde kapalı olsun
	setTimeout(function () {
		$('#collapseButton').trigger('click');
	}, 500);

	/**
	 *  data-mask özelliği olan nesneye input mask uygular
	 */
	if ($.isFunction($.fn.inputmask)) {
		$("[data-mask]").inputmask();
	}
	/**
	 * TinyMCE tinymce sınıflı  textarea üzerine yerleşecek
	 */
	if ($.isFunction($.fn.tinymce)) {
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
	}
	/**
	 * şehir seçildiğinde otomatik olark ilçe listesini getirmek için
	 */
	$("select[name='meta[city]']").change(function () {
		$.post('/admin/options/counties', {city_id: this.value}, function (counties) {
			out = '';
			$.each(counties, function (key, value) {
				out += '<option value="' + key + '">' + value + '</option>';
			});
			$("select[name='meta[county]'] option").remove();
			$("select[name='meta[county]'] ").append(out);
		});
	});

	/**
	 * üye ekleme ve profil düzenleme sayfasında avatarı kaldırma işlemini yapar
	 */
	$('#view-tab #clear').click(function () {
		$('#view-tab img').attr('src', null);
		$('#user-form input[name="meta[avatar]"]').val(null);
	});

	/**
	 * tablolardaki hepsini seç checkbox ı için
	 */
	//When unchecking the checkbox
	var table = $("#check-all").parents('table');
	$("#check-all").on('ifUnchecked', function (event) {
		//Uncheck all checkboxes
		$("input[type='checkbox']", table).iCheck("uncheck");
	});
	//When checking the checkbox
	$("#check-all").on('ifChecked', function (event) {
		//Check all checkboxes
		$("input[type='checkbox']", table).iCheck("check");
	});
});//ready function