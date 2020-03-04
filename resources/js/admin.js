require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#admin',
});


$(function(){
    $('.toggle-menu').on('click', function(){
        $("#menu").toggleClass('closed');

        var closed;
        if( $("#menu").hasClass('closed') ) {
            closed = 1;
        } else {
            closed = 0;
        }

        
        var csrf = $("meta[name='csrf-token']").attr("content");  

        $.ajax({
            url: '/admin/menu',
            method: 'post',
            data: {
                'closed': closed,
                "_token": csrf
            }
        });

    });
});