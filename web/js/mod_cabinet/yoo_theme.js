/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

jQuery(function($) {

    // Options
    var config = $('html').data('config') || {},
        navbar = $('.tm-navbar');


    if (navbar.length) {

        // Dropdown boundary
        navbar.find('[data-uk-dropdown]').attr('data-uk-dropdown','{boundary:".tm-container:first"}');

        // Navbar attached
        if (config.stickynav) {

            UIkit.$win.on('load', function() {

                $.UIkit.sticky(navbar, (function(){

                    var header = $('.tm-header'),
                        cfg        = {top: 0,media: 960};

                    if (header.length) {
                        cfg.top = header.innerHeight() * -1;
                        cfg.animation = 'uk-animation-slide-top';
                        cfg.clsactive =' tm-navbar-attached';
                    }

                    return cfg;

                })());
            });
        }
    }

    $('#overlay-menu .uk-navbar-nav [data-uk-dropdown]').attr('data-uk-dropdown','{pos: "right-top"}');

    // Social buttons
    //$('article[data-permalink]').socialButtons(config);

});
