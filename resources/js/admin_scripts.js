// START Read Image File
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.preview').attr('src', e.target.result);
            $('.remove-preview').show();
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$('.remove-preview').click(function(e) {
    e.preventDefault();
    $(this).hide();
    $('.preview').attr('src', '');
    $('.feat_img').val('');
    $('.file_val').val('');
});
// END Read Image File

// START NumOnly
$('.number').keyup(function(e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
});
// END NumOnly

// START Admin Zipcode field restriction
function strip_zip() {
    var str = document.getElementById('zip_strip');
    var spchr = /[^0-9\s,]/gi;
    var space = /\s\s+/g;
    var comma1 = /,+/g
    var comma2 = /,,+/g;
    var commaspace = /\s,/g;
    str.value = str.value.replace(spchr, '').replace(space, '').replace(comma1, ', ').replace(comma2, ', ').replace(commaspace, ', ');
}
// END Admin Zipcode field restriction

// START Uppercase
$('.to-upper').keyup(function() {
    this.value = this.value.toUpperCase();
});
// END Uppercase

// START Admin Login
$('.admin-login').on('submit', function(e) {
    e.preventDefault();
    var login_action = $(this).attr('action');
    $.ajax({
        url: login_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-login').html('Processing ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-login').html('Login');
                $('.admin-login')[0].reset();
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-login').html('Login');
                $('.admin-login')[0].reset();
            }
        }
    });

});
// END Admin Login

$('.menu-toggle').click(function(e) {
    e.preventDefault();
    $('.page-wrap').toggleClass('toggled');
});

// START DataTables
$('.datatable').DataTable({
    responsive : true
});
// END DataTables

// START wysiwyg tinymce
tinymce.init({
    selector: 'textarea.wysiwyg',
    height: 250,
    theme: 'modern',
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
    image_advtab: true
});

// END wysiwyg tinymce

// START Add New Page
$('.addpage-form').on('submit', function(e) {
    e.preventDefault();
    var addpage_action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: addpage_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                $('.addpage-form')[0].reset();
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
                // $('.admin-login')[0].reset();
            }
        }
    });

});
// END Add New Page

// START Update Page
$('.updatepage-form').on('submit', function(e) {
    e.preventDefault();
    var updatepage_action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: updatepage_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                $('.slug').attr('data-permalink', msg.data);
                location.reload();
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
            }
        }
    });

});
// END Update Page

// START Add New Post
$('.addpost-form').on('submit', function(e) {
    e.preventDefault();
    var addpost_action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: addpost_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
                // $('.admin-login')[0].reset();
            }
        }
    });

});
// END Add New Post

// START Update Post
$('.updatepost-form').on('submit', function(e) {
    e.preventDefault();
    var updatepage_action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: updatepage_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                $('.slug').attr('data-permalink', msg.data);
                location.reload();
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
            }
        }
    });

});
// END Update Post

// Start SlugifyJS
$('.slugme, .slugup').keyup(function(){
    var Text = $(this).val().trim();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
    $('.slug').val(Text);
});
$('.slugcity, .slugcityup').keyup(function(){
    var city = $(this).val();
    var state = $('.slugstate, .slugstateup').val();

    var industry = $('.slugindustry, .slugindustryup');

    if(state != null) {
        var Text = city.trim() + ' ' + state.trim();
    } else {
        var Text = city.trim();
    }

    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
    //$('.slug').val(Text);

    if(industry.val() != null) {
        var prefix = industry.find(':selected').data('slug') + '/';
    } else {
        var prefix = null;
    }

    if(prefix != null) {
        $('.slug').val(prefix + Text);
    } else {
        $('.slug').val(Text);
    }
});
$('.slugindustry, .slugindustryup, .slugstate, .slugstateup').change(function(){

    var industry = $('.slugindustry, .slugindustryup');
    var city = $('.slugcity, .slugcityup').val();
    var state = $('.slugstate, .slugstateup').val();

    if(city != null) {
        var Text = city.trim() + ' ' + state;
    } else {
        var Text = state;
    }

    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');

    if(industry.val() != null) {
        var prefix = industry.find(':selected').data('slug') + '/';
    } else {
        var prefix = null;
    }

    if(prefix != null) {
        $('.slug').val(prefix + Text);
    } else {
        $('.slug').val(Text);
    }
    
});
// END SlugifyJS

// START Slug Validator
$('.slugme').keyup(function(e) {
    e.preventDefault();

    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var slug = $('.slug').val();

    if(slug.length > 0) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
});
$('.slugup').keyup(function(e) {
    e.preventDefault();
    
    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var permalink = $('.slug').data('permalink');
    var slug = $('.slug').val();

    if(slug.length > 0 && slug != permalink) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug + '&permalink=' + permalink,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
});
$('.slugcity, .slugindustry').keyup(function(e) {
    e.preventDefault();

    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var slug = $('.slug').val();

    if(slug.length > 0) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
}).change(function(e) {
    e.preventDefault();

    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var slug = $('.slug').val();

    if(slug.length > 0) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
});
$('.slugstate').change(function(e) {
    e.preventDefault();
    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var slug = $('.slug').val();
    if(slug.length > 0) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
});
$('.slugcityup, .slugindustryup').keyup(function(e) {
    e.preventDefault();
    
    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var permalink = $('.slug').data('permalink');
    var slug = $('.slug').val();

    if(slug.length > 0 && slug != permalink) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug + '&permalink=' + permalink,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
}).change(function(e) {
    e.preventDefault();
    
    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var permalink = $('.slug').data('permalink');
    var slug = $('.slug').val();

    if(slug.length > 0 && slug != permalink) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug + '&permalink=' + permalink,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
});
$('.slugstateup').keyup(function(e) {
    e.preventDefault();
    
    var type = $('.slug').data('posttype');
    var validator = $('.slug').data('slug');
    var permalink = $('.slug').data('permalink');
    var slug = $('.slug').val();

    if(slug.length > 0 && slug != permalink) {
        $.ajax({
            url: validator + '?type=' + type + '&slug=' + slug + '&permalink=' + permalink,
            type: 'GET',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            error: function(data){
                if(data.readyState == 4){
                    errors = JSON.parse(data.responseText);
                }
            },
            success: function(data) {
                var msg = JSON.parse(data);
                if(msg.result == 'success'){
                    console.log(msg);
                    $('.slug').val(msg.data);
                } else {
                    console.log(msg);
                    $('.slug').val(msg.data);
                }
            }
        });
    }
});
// END Slug Validator

// Start Trash Page & Post
$('.btn-trash').click(function(e) {
    e.preventDefault();

    var trash = $(this);
    var entry = $(this).data('trash');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            trash.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                trash.html('Trash');
                trash.parent().parent().remove();
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                trash.html('Trash');
            }
        }
    });
});
// END Trash Page & Post

// Start RECOVER Trash Page & Post
$('.btn-recover').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('recover');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Recover');
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Recover');
            }
        }
    });
});
// END RECOVER Trash Page & Post

// Start DELETE Trash Page & Post
$('.btn-delete').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('delete');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete');
                selector.parent().parent().remove();
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete');
            }
        }
    });
});
// END DELETE Trash Page & Post

// Start EMPTY Trash Page & Post
$('.empty-trash').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('type');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { type : entry },
        beforeSend: function() {
            selector.html('Processing...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Empty Trash');
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Empty Trash');
            }
        }
    });
});
// END EMPTY Trash Page & Post

// START Add New Post
$('.add-category').on('submit', function(e) {
    e.preventDefault();

    var action = $(this).attr('action');

    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-cat').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-cat').html('Add');
                location.reload();
            } else {
                alertify.error(msg.message);
                $('.btn-ca').html('Add');
            }
        }
    });

});
// END Add New Post

// START Update Category
$('.update-category').on('submit', function(e) {
    e.preventDefault();

    var action = $(this).attr('action');

    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Updating...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Update');
                $('.slug').attr('data-permalink', msg.data);
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Update');
            }
        }
    });

});
// END Update Category

// START Delete Category
$('.btn-delcat').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('delete');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete');
                selector.parent().parent().remove();
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete');
            }
        }
    });
});
// END Delete Category

// START Delete Business
$('.biz-delete').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('id');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete');
                selector.parent().parent().remove();
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete');
            }
        }
    });

});
// END Delete Business

// START Void Business
$('.biz-void').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('id');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Void');
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Void');
            }
        }
    });

});
// END Void Business

// START Verify Business
$('.biz-verify').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('id');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Void');
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Void');
            }
        }
    });

});
// END Verify Business

// START Add New State
$('.addstate-form').on('submit', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                $('.addstate-form')[0].reset();
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
            }
        }
    });

});
// END Add New State

// START Update State
$('.updatestate-form').on('submit', function(e) {
    e.preventDefault();
    var updatepage_action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: updatepage_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                $('.slug').attr('data-permalink', msg.data);
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
            }
        }
    });

});
// END Update State

// Start DELETE State
$('.state-delete').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('delete');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete');
                selector.parent().parent().remove();
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete');
            }
        }
    });
});
$('.delstate-all').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('type');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { type : entry },
        beforeSend: function() {
            selector.html('Processing...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete All');
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete All');
            }
        }
    });
});
// END DELETE State

// START Add New City
$('.addcity-form').on('submit', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                $('.addcity-form')[0].reset();
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
            }
        }
    });

});
// END Add New City

// START Update State
$('.updatecity-form').on('submit', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    tinyMCE.triggerSave();
    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-save').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-save').html('Save');
                $('.slug').attr('data-permalink', msg.data);
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-save').html('Save');
            }
        }
    });

});
// END Update State


// Start DELETE City
$('.city-delete').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('delete');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete');
                selector.parent().parent().remove();
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete');
            }
        }
    });
});
$('.delcity-all').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('type');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { type : entry },
        beforeSend: function() {
            selector.html('Processing...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete All');
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete All');
            }
        }
    });
});
// END DELETE City

// START Import States & Cities
$('.stateimport-form').on('submit', function(e) {
    e.preventDefault();
    var selector = $(this);
    var action = $(this).attr('action');
    var log_panel = $('.logs');
    var log_wrap = $('.logs-wrap');

    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-import').html('Importing ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                // alertify.success(msg.message);
                $('.btn-import').html('Import');
                selector[0].reset();
                log_panel.show();
                log_wrap.html(msg.log);
            } else {
                alertify.error(msg.message);
                $('.btn-import').html('Import');
            }
        }
    });

});
$('.cityimport-form').on('submit', function(e) {
    e.preventDefault();
    var selector = $(this);
    var action = $(this).attr('action');
    var log_panel = $('.logs');
    var log_wrap = $('.logs-wrap');

    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-import').html('Importing ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                // alertify.success(msg.message);
                $('.btn-import').html('Import');
                selector[0].reset();
                log_panel.show();
                log_wrap.html(msg.log);
            } else {
                alertify.error(msg.message);
                $('.btn-import').html('Import');
            }
        }
    });

});
$('.clear-logs').click(function(e) {
    e.preventDefault();
    var log_panel = $('.logs');
    var log_wrap = $('.logs-wrap');

    log_wrap.html('');
    log_panel.hide();
});
// END Import States & Cities

// START Update Configurations
$('.config-form').on('submit', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-config').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-config').html('Save Configuration');
                location.reload();
            } else {
                alertify.error(msg.message);
                $('.btn-config').html('Save Configuration');
            }
        }
    });

});
// END Update Configurations

// START Update User
$('.userdetails-form').on('submit', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-user').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-user').html('Save');
                location.reload();
            } else {
                alertify.error(msg.message);
                $('.btn-user').html('Save');
            }
        }
    });

});
// END Update User

// START Update Password
$('.userpass-form').on('submit', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn-password').html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                $('.btn-password').html('Save');
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                $('.btn-password').html('Save');
            }
        }
    });

});
// END Update Password

// START Add New Industry
$('.addindustry-form').on('submit', function(e) {
    e.preventDefault();

    var action = $(this).attr('action');
    var form = $(this);
    var trigger = $('.btn-save');

    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            trigger.html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                trigger.html('Save');
                form[0].reset();
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                trigger.html('Save');
            }
        }
    });

});
// END Add New Industry

// START Update Industry
$('.updateindustry-form').on('submit', function(e) {
    e.preventDefault();

    var action = $(this).attr('action');
    var form = $(this);
    var trigger = $('.btn-save');
    
    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            trigger.html('Saving ...');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                alertify.success(msg.message);
                trigger.html('Save');
                location.replace(msg.redirect);
            } else {
                alertify.error(msg.message);
                trigger.html('Save');
            }
        }
    });

});
// END Industry

// START Delete Industry
$('.btn-delindustry').click(function(e) {
    e.preventDefault();

    var selector = $(this);
    var entry = $(this).data('delete');
    var action = $(this).data('action');
    
    $.ajax({
        url: action,
        type: 'POST',
        data : { id : entry },
        beforeSend: function() {
            selector.html('<i class="fa fa-refresh fa-spin fa-fw txt-fff"></i>');
        },
        error: function(data){
            if(data.readyState == 4){
                errors = JSON.parse(data.responseText);
            }
        },
        success: function(data) {
            var msg = JSON.parse(data);
            if(msg.result == 'success'){
                console.log(msg);
                alertify.success(msg.message);
                selector.html('Delete');
                selector.parent().parent().remove();
                location.reload();
            } else {
                console.log(msg);
                alertify.error(msg.message);
                selector.html('Delete');
            }
        }
    });
});
// END Delete Industry