﻿/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.entities = false;
	
	config.entities_latin = false;
	
	config.browserContextMenuOnCtrl = false;
	
	config.toolbar = 'MyToolbar';
 
	config.toolbar_MyToolbar =
	[
		{ name: 'document', items : [ 'Source' ] },
		{ name: 'clipboard', items : [ 'PasteFromWord' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList'] },
		{ name: 'links', items : [ 'Link','Unlink' ] },
	];

};