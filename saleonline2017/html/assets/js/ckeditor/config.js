/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

var editor = CKEDITOR.instances['detail'];
if (editor) {
    editor.destroy(true);
}

CKEDITOR.editorConfig = function (config) {
    config.height = '600px';

};

CKEDITOR.replace('detail',
        {
            filebrowserBrowseUrl: 'http://localhost:8080/saleonline/fckeditor/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: 'http://localhost:8080/saleonline/fckeditor/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: 'http://localhost:8080/saleonline/fckeditor/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: 'http://localhost:8080/saleonline:8080/fckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: 'http://localhost:8080/saleonline/fckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: 'http://localhost:8080/saleonline/fckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

        });