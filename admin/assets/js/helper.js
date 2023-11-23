$(document).ready(function() {
    $('#summernote').summernote({
        tabsize: 2,
        height: 300
    });
    
});

$('.dropify').dropify({
    tpl: {
        wrap:            '<div class="dropify-wrapper"></div>',
        loader:          '<div class="dropify-loader"></div>',
        message:         '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
        preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
        filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
        clearButton:     '<button type="button" class="dropify-clear">{{ remove }}</button>',
        errorLine:       '<p class="dropify-error">{{ error }}</p>',
        errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
    }
});

$(document).ready(function() {
    $('.select-tags').select2();
});

$(document).ready(function() {
    $('#category_name').on('keyup', function() {

        $("#slug").val('')
        var category = $(this).val();

        category = slugify(category);

        $("#slug").val(category)
    });

    function slugify(text) {
        return text.toLowerCase()
            .replace(text, text)
            .replace(/^-+|-+$/g, '')
            .replace(/\s/g, '-')
            .replace(/\-\-+/g, '-');
    }
});