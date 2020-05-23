window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    $(function(){
        $(window).on('scroll', function(){
            if($(window).scrollTop() > 50) {
                $(".header").addClass('active');
            } else {
                $(".header").removeClass('active');
            }
        });
    });
} catch (e) {}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';