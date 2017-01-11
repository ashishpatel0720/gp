
/**
 * Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/* exported initSample */

if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
	CKEDITOR.tools.enableHtml5Elements(document);

// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';

var initSample = (function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');

	return function() {
		var editorElement = CKEDITOR.document.getById('editor');

		// :(((
		
			editorElement.setHtml('Course Description');
		// Depending on the wysiwygare plugin availability initialize classic or inline editor.
		if (wysiwygareaAvailable) {
			// fill
	// 			{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
	// { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
	// { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
	// { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
 //        'HiddenField' ] },
	// '/',
	// { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
	// { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	// '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	// { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	// { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
	// '/',
	// { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
	// { name: 'colors', items : [ 'TextColor','BGColor' ] },
	// { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }

			CKEDITOR.config.toolbar = [
 	{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
	{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
	'/',
	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	{ name: 'insert', items : [ 'Table','HorizontalRule','Smiley','SpecialChar'] },
	'/',
	{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
	{ name: 'colors', items : [ 'TextColor'] },
	{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-' ] }
] ;
			CKEDITOR.replace('editor');
		} else {
			editorElement.setAttribute('contenteditable', 'true');
			CKEDITOR.inline('editor');

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if (CKEDITOR.revision == ('%RE' + 'V%')) {
			return true;
		}

		return !!CKEDITOR.plugins.get('wysiwygarea');
	}
})();
