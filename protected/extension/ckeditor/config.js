/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        
        
        config.filebrowserBrowseUrl = '/additions/kcfinder/browse.php?opener=ckeditor&type=files';
        config.filebrowserImageBrowseUrl = '/additions/kcfinder/browse.php?opener=ckeditor&type=images';
        config.filebrowserFlashBrowseUrl = '/additions/kcfinder/browse.php?opener=ckeditor&type=flash';
        config.filebrowserUploadUrl = '/additions/kcfinder/upload.php?opener=ckeditor&type=files';
        config.filebrowserImageUploadUrl = '/additions/kcfinder/upload.php?opener=ckeditor&type=images';
        config.filebrowserFlashUploadUrl = '/additions/kcfinder/upload.php?opener=ckeditor&type=flash';
};
