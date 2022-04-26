/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {


	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowserUrl = 'http://localhost/sisweb/assets/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'http://localhost/sisweb/assets/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'http://localhost/sisweb/assets/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'http://localhost/sisweb/assets/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'http://localhost/sisweb/assets/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'http://localhost/sisweb/assets/upload.php?type=flash';
};
