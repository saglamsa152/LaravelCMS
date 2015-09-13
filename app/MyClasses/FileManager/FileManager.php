<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 12.09.2015
 * Time: 17:41
 */

namespace App\MyClasses\FileManager;


class FileManager
{
    private $pluginDir = "assets/admin/plugins/ResponsiveFilemanager/";

    public function getOpenButton($type=0,$field_id=null,$fldr = null)
    {
		$field_id = is_null($field_id) ? '': '&field_id='.$field_id;
		$fldr = is_null($fldr) ? '': '&fldr='.$fldr;
		$request='type='.$type.$field_id.$fldr;
        echo '
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fileManagerModal">
   				' . _('Open Filemanager') . '
			</button>';

        echo \View::file(__DIR__ . '/views/modal.php', array('pluginDir' => $this->pluginDir,'request'=>$request));
    }

}

/*
 *
 * demo sayfasında fancybox ile çalıştırıyor kodlar aşağıda
 *
 * jQuery(document).ready(function ($) {
      $('.iframe-btn').fancybox({
			  'width'	: 880,
			  'height'	: 570,
			  'type'	: 'iframe',
			  'autoScale'   : false
      });


			//
			// Handles message from ResponsiveFilemanager
			//
			function OnMessage(e){
			  var event = e.originalEvent;
			   // Make sure the sender of the event is trusted
			   if(event.data.sender === 'responsivefilemanager'){
			      if(event.data.field_id){
			      	var fieldID=event.data.field_id;
			      	var url=event.data.url;
							$('#'+fieldID).val(url).trigger('change');
							$.fancybox.close();

							// Delete handler of the message from ResponsiveFilemanager
							$(window).off('message', OnMessage);
			      }
			   }
			}

		  // Handler for a message from ResponsiveFilemanager
			$('.iframe-btn').on('click',function(){
			  $(window).on('message', OnMessage);
			});



      $('#download-button').on('click', function() {
	    ga('send', 'event', 'button', 'click', 'download-buttons');
      });
      $('.toggle').click(function(){
	    var _this=$(this);
	    $('#'+_this.data('ref')).toggle(200);
	    var i=_this.find('i');
	    if (i.hasClass('icon-plus')) {
		  i.removeClass('icon-plus');
		  i.addClass('icon-minus');
	    }else{
		  i.removeClass('icon-minus');
		  i.addClass('icon-plus');
	    }
      });
});



function open_popup(url)
{
        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width-w)/2);
        var t = Math.floor((screen.height-h)/2);
        var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
}
 * */
