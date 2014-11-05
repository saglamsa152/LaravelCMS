/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
	// Define changes to default configuration here. For example:
	config.language = 'tr';
	config.uiColor = '#F4F4F4';
	config.toolbar = [
		[ 'Source', '-', 'Preview', '-', 'Templates' ] ,
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] ,
		[ 'Find', 'Replace', '-', 'SelectAll'] ,
		[ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] ,
		'/',//Satır sonu
		[ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] ,
		[ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] ,
		[ 'Link', 'Unlink' ] ,
		[ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'PageBreak'] ,
		[ 'Styles', 'Format', 'Font', 'FontSize' ] ,
		[ 'TextColor', 'BGColor' ],
		[ 'Maximize', 'ShowBlocks' ] ,
	];

	config.filebrowserBrowseUrl='/assets/admin/js/plugins/fileman/index.html';
	//config.filebrowserUploadUrl="/admin/upload-form";
	//config.filebrowserImageBrowseUrl='/assets/admin/js/plugins/ResponsiveFilemanager/filemanager/dialog.php?type=1';
	//config.filebrowserImageUploadUrl=roxyFileman+'/type=image';
};
