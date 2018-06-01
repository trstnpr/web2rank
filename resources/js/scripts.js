// $('#under_construction').modal('show');

// START Navbar Transitions
// $(function () {
//     $(document).scroll(function () {
//         var $nav = $('.navbar');

//         $nav.toggleClass(
//             'scrolled',
//             $(this).scrollTop() > $nav.height()
//         );
//     });
// });
// END Navbar Transitions

$('.smooth-scroll').click(function () {
    var aTag = $(this).attr('href');
    $('html,body').animate({
        scrollTop: $(aTag).offset().top
    }, 600);

    return false;
});

// START Init Parallax.js
$('.parallax').parallax();
// END Init Parallax.js

// Start Blog
$('.slider-wrap .item:first').addClass('active');
// End Blog

// START Full Load Render
window.onload = function () {
    $('body').show();
}
// END Full Load Render

// START Tooltip
$('[data-toggle="tooltip"]').tooltip(); 
// END Tooltip

// START Attribute for background images
$('.data-img').each(function() {
    var attr = $(this).attr('data-bg');
    if (typeof attr !== typeof undefined && attr !== false) {
        $(this).css('background-image', 'url('+attr+')');
    }
});
// END Attribute for background images

// START Contact Us
$('.form-contact').on('submit', function(e) {
    e.preventDefault();

    var contact_form = $(this);
    var contact_action = contact_form.data('action');
    var contact_trigger = $('.btn-send');
    
    $.ajax({
        url: contact_action,
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            contact_trigger.html('Sending ...');
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
                contact_trigger.html('Send&nbsp;&nbsp;<i class="fa fa-paper-plane">');
                contact_form[0].reset();
                grecaptcha.reset();
                location.reload();
            } else {
                alertify.error(msg.message);
                contact_trigger.html('Send&nbsp;&nbsp;<i class="fa fa-paper-plane">');
                contact_form[0].reset();
                grecaptcha.reset();
            }
        }
    });

});
// END Contact Us

// START Home Slider
$('#bannerSlider, #testimonialSlider').carousel({
    interval:   3000
}).swipe({
    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll:"vertical"
});


var clickEvent = false;
$('#bannerSlider, #testimonialSlider').on('click', '.nav a', function() {
        clickEvent = true;
        $('.nav li').removeClass('active');
        $(this).parent().addClass('active');        
}).on('slid.bs.carousel', function(e) {
    if(!clickEvent) {
        var count = $('.nav').children().length -1;
        var current = $('.nav li.active');
        current.removeClass('active').next().addClass('active');
        var id = parseInt(current.data('slide-to'));
        if(count == id) {
            $('.nav li').first().addClass('active');    
        }
    }
    clickEvent = false;
});
// END Home Slider