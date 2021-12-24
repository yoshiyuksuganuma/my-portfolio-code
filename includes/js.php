<script type="text/javascript">
    jQuery(function($) {
        "usestrict";


        const $win = $(window),
            $body = $('body'),
            $header = $('header');

        { //スティッキーヘッダー、ページトップボタンのスクロールイベント
            let $serviceH = $('.service').outerHeight(),
                $pageTop = $('.page-top'),
                $heroH = $('hero').outerHeight();
            $pageTop.hide();
            $win.on('load scroll', function() {
                $scroll = $win.scrollTop();
                if ($body.attr('id') == 'index') {
                    if ($scroll > $heroH) {
                        $header.addClass('sticky-header');
                    } else {
                        $header.removeClass('sticky-header');
                    }

                    if ($win.width() > 1199) {
                        if ($scroll > $serviceH) {
                            $pageTop.fadeIn(250);
                        } else {
                            $pageTop.fadeOut(250);
                        }
                    }
                }
            });
        }

        { //スライダー

            $(".slider__list").slick({
                arrows: false,
                dots: true,
                autoplay: true,
                autoplaySpeed: 3000,
                speed: 700,
                fade: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false,
                dotsClass: 'slider__dots',
            });
        }

        { //ページトップボタンクリックイベント

            $('a[href^="#"]').on('click', function() {
                const gap = $header.outerHeight();
                const speed = 500;
                const href = $(this).attr("href");
                const target = $(href == "#" || href == "" ? "html" : href);
                const position = target.offset().top - gap;

                $("html, body").animate({
                    scrollTop: position
                }, speed, "swing");
                return false;
            });
        }

        { //ハンバーガーボタン、メニュー
            $('.burger-btn').on('click', function() {
                $('.burger-btn__bar').toggleClass('burger-active');
                $('.g-nav-sp').fadeToggle();
                $body.toggleClass('no-scroll');

            });
            $win.resize(function() {
                if ($win.width() > 1199) {
                    $('.g-nav-sp').hide();
                    $('.burger-btn__bar').removeClass('burger-active');
                    $body.removeClass('no-scroll');
                }
            });
        }







    });
</script>