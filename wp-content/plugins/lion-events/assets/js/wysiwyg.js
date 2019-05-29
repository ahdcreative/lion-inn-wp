/**
 * Enable WYSIWYG functionality for the event description textareas
 */
jQuery(function($) {

    $('textarea.desc-editor').summernote({
        height: 130,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['superscript']],
            ['media', ['hr']]
        ]
    });
    
});