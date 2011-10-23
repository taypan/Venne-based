jQuery(document).ready(function() {
	$('.control-editor').each(function(){
		var basePath = $(this).attr("vennebasepath");
		
		$(this).ckeditor(
		{
			filebrowserBrowseUrl: basePath + '/kcfinder/browse.php?type=files',
			filebrowserImageBrowseUrl: basePath + '/kcfinder/browse.php?type=images',
			filebrowserFlashBrowseUrl: basePath + '/kcfinder/browse.php?type=flash',
			filebrowserUploadUrl: basePath + '/kcfinder/upload.php?type=files',
			filebrowserImageUploadUrl: basePath + '/kcfinder/upload.php?type=images',
			filebrowserFlashUploadUrl: basePath + '/kcfinder/upload.php?type=flash',
					
			height: "600",
			toolbar :
			[
			['Source'],
			['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
			['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
			['BidiLtr','BidiRtl'],
			'/',
			['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
			['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['Link','Unlink','Anchor'],
			['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
			'/',
			['Styles','Format','Font','FontSize'],
			['TextColor','BGColor'],
			['Maximize', 'ShowBlocks','-','About']
			]
		});
	});
});