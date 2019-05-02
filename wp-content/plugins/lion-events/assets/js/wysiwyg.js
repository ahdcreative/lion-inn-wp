/**
 * Enable WYSIWYG functionality for the event description textareas
 */
jQuery(function($) {
    $('textarea.froala-editor').froalaEditor({

        placeholderText: '<i> Enter Description... </i>',

        toolbarButtons: ['bold', 'italic', 'underline', '|', 'superscript', 'insertLink', 'insertHR', '|', 'help', 'html', '|', 'wordPaste'],  
    });
});