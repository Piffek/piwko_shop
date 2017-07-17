
    $('section').height($(window).height());
    $('section').first().addClass('active');

    $(document).on('mousewheel DOMMouseScroll', function (e) {
        e.preventDefault();
        var active = $('section.active');
        var delta = e.originalEvent.detail < 0 || e.originalEvent.wheelDelta > 0 ? 1 : -1;
        
        if (delta < 0) {
            next = active.next();
            if (next.length) {

                var timer = setTimeout(function () {

                    $('body, html').animate({
                        scrollTop: next.offset().top
                    }, 'slow');
                    
                    next.addClass('active')
                        .siblings().removeClass('active');
                    
                    clearTimeout(timer);
                }, 50);
            }

        } else {
            prev = active.prev();

            if (prev.length) {
                var timer = setTimeout(function () {
                    $('body, html').animate({
                        scrollTop: prev.offset().top
                    }, 'slow');

                    prev.addClass('active')
                        .siblings().removeClass('active');
                    
                    clearTimeout(timer);
                }, 50);
            }

        }
    });