/**
 * Created by sametatabasch on 19.11.2014. todo Beta sürümünde bu  dosyanın  toparlanması  lazım
 */
$(function () {
	var body = $('body');
	var waitingAnimationHtml =
			'<div class="spinner">' +
			'<div class="rect1"></div>' +
			'<div class="rect2"></div>' +
			'<div class="rect3"></div>' +
			'<div class="rect4"></div>' +
			'<div class="rect5"></div>' +
			'</div>';
	var modal = $(
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
			'<button id="0" type="button" class="btn btn-default" data-dismiss="modal"></button>' +
			'<button id="1" type="button" class="btn btn-primary"></button>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'</div>');

	var modalHeader = $('.modal-header', modal);
	var modalTitle = $('.modal-title', modalHeader);
	var modalBody = $('.modal-body', modal);
	var modalFooter = $('.modal-footer', modal);
	/**
	 * Modal Close Button
	 * @type {*|jQuery|HTMLElement}
	 */
	var modalFooterButton0 = $('#0', modalFooter);
	var modalFooterButton1 = $('#1', modalFooter);
	/**
	 * AjaxForm sınıflı formları ajax ile çalıştırır
	 */
	$('.ajaxForm').on('submit', function () {

		if (typeof(CKEDITOR) != 'undefined' && $('.ckeditor').length > 0) {//CKEDİTOR tanımlanmış ve sayfada ckeditör aktif edilmişse
			var editorName = $('.ckeditor').attr('name');//ckeditor sınıflı  nesnenin name özelliği
			//ckeditor deki verilerin textarea ya aktar
			CKEDITOR.instances[editorName].updateElement();
		}
		/* waiting animation */
		body.append(modal);
		//modal  kapatıldığında sayfadan silinsin
		modal.on('hidden.bs.modal', function (e) {
			$(modal, body).remove();
		});
		if (typeof($(this).attr('title')) != 'undefined') {
			modalTitle.html($(this).attr('title'));
		} else modalHeader.hide();
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
				modalBody.fadeOut(100, function () {
					$(this).html(cevap).fadeIn('slow');
				});
				modalFooter.show();
				modalFooterButton0.hide();
				//modal  kapatıldığında yönlendirme varsa  yönlendir.
				modal.on('hidden.bs.modal', function (e) {
					if (jQuery.type(returnData['redirect']) != 'undefined') {
						window.location.replace(returnData['redirect']);
					} else {
						$(modal, body).remove();
					}
				});
				// set Ok button
				modalFooterButton1.html(gettext.ok).click(function () {
					modal.modal('hide')
				});
			}
		});
		return false;
	});

	/**
	 * Şifre değiştirme formunu  çalıştırır
	 */
	$('.ajaxFormPassword').on('submit', function () {
		$('#updatePassword').append('<div class="overlay">' + waitingAnimationHtml + '</div>');
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
	 * silme  işlemleri  için onay alınmasını ve formun çalışmasını sağlar
	 */
	$('.ajaxFormDelete').on('submit', function () {
		var form = $(this);
		body.append(modal);
		//modal  kapatıldığında sayfadan silinsin
		modal.on('hidden.bs.modal', function (e) {
			$(modal, body).remove();
		});
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
					modalBody.fadeOut(100, function () {
						$(this).html(cevap).fadeIn('slow');
					});
					// hide no Button
					modalFooterButton1.hide();
					modalFooterButton0.html(gettext.ok);
					//modal  kapatıldığında yönlendirme varsa  yönlendir.
					modal.on('hidden.bs.modal', function (e) {
						if (jQuery.type(returnData['redirect']) != 'undefined') {
							window.location.replace(returnData['redirect']);
						} else {
							$(modal, body).remove();
						}
					});
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
		body.append(modal);
		//modal  kapatıldığında sayfadan silinsin
		modal.on('hidden.bs.modal', function (e) {
			$(modal, body).remove();
		});
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
			modalFooterButton1.click(function (e) {
				modalBody.html(waitingAnimationHtml);
				triggerAjax();
			});
			modal.modal('show');
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
			$.ajax({
				type   : 'POST',
				url    : link.attr('data-link'),
				data   : {id: ids},
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
						} else {
							$(modal, body).remove();
						}
					});
					// set Ok button
					modalFooterButton1.html(gettext.ok).click(function () {
						modal.modal('hide');
					});
				}
			});
		}
	});

	/**
	 * iletişim  mesajlarında cevaplama işlemlerini  yapar todo iletişim işlemleri mail sayfasından yapıldığı için silinecek
	 */
	$('a.contactAnswer').click(function () {
		var contact = $.parseJSON($(this).attr('data-value'));
		var link = $(this);
		var token = $('input[name="_token"]', link);
		body.append(modal);
		//modal  kapatıldığında sayfadan silinsin
		modal.on('hidden.bs.modal', function (e) {
			$(modal, body).remove();
		});
		$('.modal-dialog', modal).removeClass('modal-sm');// normal  boyutta olması için
		//add Title
		modalTitle.html(gettext.reply);
		//add message
		modalBody.html(
				'<div class="col-md-12">' +
				'<form id="reply" class="form-horizontal" role="form" method="post">' +
				'<input type="hidden" name="email" value="' + contact.meta['email'] + '">' +
				'<input type="hidden" name="name" value="' + contact.meta['name'] + '">' +
				'<div class="form-group">' +
				'<input class="form-control" type="text" placeholder="' + gettext.subject + '" name="subject">' +
				'</div>' +
				'<div class="form-group">' +
				'<textarea id="answer" class="form-control ckeditor" name="answer"></textarea>' +
				'</div>' +
				'</form>' +
				'</div>' +
				'<script>' +
				'CKEDITOR.replace("answer",{' +
				"toolbar:[[ 'Bold', 'Italic', 'Underline', 'Strike','-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' , '-', 'TextColor' ]]" +
				'});' +
				'</script>' +
				'<div class="clearfix"></div>'
		);
		$('#reply', modal).append(token);//crsf token add to form
		var form = $('#reply', modal);
		// add yes and no  button
		modalFooterButton0.hide();
		modalFooterButton1.html(gettext.submit);
		//if click Ye buton
		modalFooterButton1.click(function (e) {
			modalBody.html(waitingAnimationHtml);
			if (typeof(CKEDITOR) != 'undefined' && $('.ckeditor', form).length > 0) {//CKEDİTOR tanımlanmış ve sayfada ckeditör aktif edilmişse
				var editorName = $('.ckeditor', form).attr('name');//ckeditor sınıflı  nesnenin name özelliği
				//ckeditor deki verilerin textarea ya aktar
				CKEDITOR.instances[editorName].updateElement();
			}
			$.ajax({
				type   : 'POST',
				url    : link.attr('data-link'),
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
					modalBody.fadeOut(100, function () {
						$(this).html(cevap).fadeIn('slow');
					});
					modalFooter.show();
					//modal  kapatıldığında yönlendirme varsa  yönlendir.
					modal.on('hidden.bs.modal', function (e) {
						if (jQuery.type(returnData['redirect']) != 'undefined') {
							window.location.replace(returnData['redirect']);
						}
						$(modal, body).remove();
					});
					// set Ok button
					modalFooterButton1.html(gettext.ok).click(function () {
						modal.modal('hide');
					});
				}
			});
		});
		modal.modal('show');

	});

    /**
	 * İletişim sayfasındaki mesaja tıklandığında modal içerisinde mesajı açar todo iletişim işlemleri mail sayfasından yapıldığı için silinecek
	 */
	$('.clickToRead').click(function () {
		var message = $.parseJSON($(this).attr('data-value'));// id,name,content
		var contact = $(this);// tıklanan mesaja ait <div>
		var data = $.parseJSON('{"id":"' + message.id + '","toggle":false}');
		$.post('/admin/mark-as-read-contact', data).done(function () {
			contact.parents('tr').removeClass('info');// mesaj satırının arka planın beyaz yapılıyor(okundu manası)
		})
		body.append(modal);
		modalTitle.html(message.name);
		modalBody.html(message.content);
		modalFooterButton0.html(gettext.close);
		modalFooterButton1.html(gettext.answer);
		modal.modal('show');
		modalFooterButton1.click(function () {
			modal.modal('hide');
			$(modal, body).remove();
			$('#contactAnswer-' + message.id).trigger('click');
		});
	});

    /**
	 * Sadece buton üzerinde geri  bildirim veren ajax formlarını  çalıştırır
	 */
	$('.ajaxButton').on('submit', function () {
		var form = $(this);
		var submitButton = $('input[type="submit"]', $(this));
		submitButton.attr('disabled', 'disabled');
		submitButton.val(gettext.saving);
		$.ajax({
			type   : 'POST',
			url    : form.attr('action'),
			data   : form.serializeArray(),
			success: function (returnData) {
				submitButton.val(gettext.saved);
				setTimeout(function () {
					submitButton.removeAttr('disabled');
					submitButton.val(gettext.save);
				}, 1000);

			}
		});
		return false;
	});

	/**
	 * data-action özelliği delete olan butonlar tıklandığında silme işlemi  için  onay alan ve silme işlemini  yapan fonksiyon
	 * slider sayfasında slide silme buyonu için oluşturuldu. diğer silme işlemleri için kullanımı ayarlanabilir.
	 */
	$('button[data-action="delete"]').click(function () {
		var url = $(this).attr('data-url');
		var id = $(this).attr('data-id');
		body.append(modal);
		//modal  kapatıldığında sayfadan silinsin
		modal.on('hidden.bs.modal', function (e) {
			$(modal, body).remove();
		});
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
			$.ajax({
				type   : 'POST',
				url    : url,
				data   : {"id": id},
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
					// hide no Button
					modalFooterButton1.hide();
					modalFooterButton0.html(gettext.ok);
					//modal  kapatıldığında yönlendirme varsa  yönlendir.
					modal.on('hidden.bs.modal', function (e) {
						if (jQuery.type(returnData['redirect']) != 'undefined') {
							window.location.replace(returnData['redirect']);
						} else {
							$(modal, body).remove();
						}
					});
				}
			});
		});

	});

	/**
	 * içeriği tada target ile belirtilmiş formları modal içerisinde açar ve işleme sokar
     * rightSide/list/slider.php:25 de kullanımı var
	 */
	$('[data-target]').click(function () {
		var target = $($(this).attr("data-target")).clone();//
		var title = $(this).html();
		body.append(modal);
		//modal  kapatıldığında sayfadan silinsin
		modal.on('hidden.bs.modal', function (e) {
			modalBody.empty();
			$(modal, body).remove();
		});
		modalTitle.html(title);
		modalBody.html(target);
		$('input[name="price"]').inputmask("9{1,4}");//aidat için sayı maskesi
		target.removeClass('hidden');
		modalFooterButton0.html(gettext.close);
		modalFooterButton1.html(gettext.ok);
		modal.modal('show');
		modalFooterButton1.click(function () {
			var form = $('form', modalBody)
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
					modalBody.fadeOut(100, function () {
						$(this).html(cevap).fadeIn('slow');
					});
					modalFooterButton0.hide();
					//modal  kapatıldığında yönlendirme varsa  yönlendir.
					modal.on('hidden.bs.modal', function (e) {
						if (jQuery.type(returnData['redirect']) != 'undefined') {
							window.location.replace(returnData['redirect']);
						} else {
							$(modal, body).remove();
						}
					});
					// set Ok button
					modalFooterButton1.html(gettext.ok).click(function () {
						modal.modal('hide');
						modalBody.removeClass('bg-' + returnData['status'] + ' text-' + returnData['status']);
					});
				}
			});
		})
	});

	/**
	 * aidat sayfası formu  ödeme butonuna tıklayınca çalışan ajax todo aidat işlemleri  dernek dalında bu daldan kaldırılacak
	 */
	$('.ajaxFormDues').on('submit', function (t) {
		var form = $(this);
		var formData = form.serializeArray();
		var duesAmount = form.attr('data-duesAmount');
		body.append(modal);
		//modal  kapatıldığında sayfadan silinsin
		modal.on('hidden.bs.modal', function (e) {
			$(modal, body).remove();
		});
		//add modalTitle
		modalTitle.html(form.attr('data-title'));
		modalFooterButton1.show();//eğer hiç seçim yapılmayıp gizlendiyse tekrar açılması için
		var months = new Array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");
		var out = '<table class="table table-striped"><tr><th>Açıklama</th><th>Miktar</th></tr>';
		var donate = false;// bağış yapılmışmı yapılmamışmı  kontrolü
		var total = 0;
		$.each(formData, function (key, data) {
			if (data.name == 'dues[]') {
				var dues = data.value.split('-');
				out += '<tr><td>' + dues[0] + ' ' + months[dues[1] - 1] + ' ayı aidatı </td><td>' + duesAmount + '</td></tr>';
				total += parseInt(duesAmount);
			}
			if (data.name == 'donate') {
				donate = data.value;
			}
			if (data.name == 'donateAmount' && donate) {
				out += '<tr><td>Bağış</td><td>' + data.value + '</td></tr>';
				total += parseInt(data.value);
			}
		});
		out += '<tr><th>Toplam</th><th>' + total + '</th></tr></table>'
		if (total == 0) {
			modalBody.html('Hiç Seçim yapmadınız');
			modalFooterButton1.hide();
		} else {
			modalBody.html(out);
		}

		modalFooterButton1.html(gettext.pay);
		modalFooterButton0.html(gettext.close);
		modal.modal('show');
		modalFooterButton1.click(function () {
			modalBody.html(waitingAnimationHtml);
			$.ajax({
				type   : 'POST',
				url    : form.attr('action'),
				data   : formData,
				success: function (returnData) {
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
					// hide no Button
					modalFooterButton1.hide();
					modalFooterButton0.html(gettext.ok);
					//modal  kapatıldığında yönlendirme varsa  yönlendir.
					modal.on('hidden.bs.modal', function (e) {
						if (jQuery.type(returnData['redirect']) != 'undefined') {
							window.location.replace(returnData['redirect']);
						} else {
							$(modal, body).remove();
						}
					});
				}
			});
		});
		return false;
	});


})//ready Function