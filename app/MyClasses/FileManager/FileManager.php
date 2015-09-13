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
    private $pluginDir = "/assets/admin/plugins/ResponsiveFilemanager/";

	/**
	 * type 0=> all files
	 * type 1 => only images
	 * type 2 => only file
	 * type 3 => only video
	 *
	 * @param array $arg
	 */
    public function getOpenButton(Array $arg)
    {
		// set default
		$options = array(
			'btn_class' => 'btn btn-primary',
			'btn-title' =>_('Open Filemanager'),
			'type'=>0,
			'field_id' => null,
			'fldr' => null,
			'targetImageId'=>null);
		$options=array_merge($options,$arg);
		extract($options);
		$field_id = is_null($field_id) ? '': '&field_id='.$field_id;
		$fldr = is_null($fldr) ? '': '&fldr='.$fldr;
		$request='type='.$type.$field_id.$fldr;
        echo '
			<button type="button" class="'.$btn_class.'" data-toggle="modal" data-target="#fileManagerModal">
   				' . $btn_title . '
			</button>';

        echo \View::file(__DIR__ . '/views/modal.php', array('pluginDir' => $this->pluginDir,'request'=>$request,'targetImageId'=>$targetImageId));
    }

}

