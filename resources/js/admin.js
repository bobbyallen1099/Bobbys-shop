require('./bootstrap');
require('select2');
require('dropzone');

require('jquery-ui/ui/widgets/sortable.js');


$(function(){
    if($( "#sortable" ).length) {

        var csrf = $("meta[name='csrf-token']").attr("content");

        $( "#sortable" ).sortable({
            stop: function( event, ui ) {
                var product_id = $("#sortable").data('product-id');
                var $data = {};
                var $items = {}
                $("#sortable .image").each(function($index, $item) {
                    var $image_id = $($item).data('image-id');

                    $items[$image_id] = $index;
                });

                $data['_token'] = csrf;
                $data['items'] = $items;

                $.ajax({
                    url: '/admin/products/'+product_id+'/images/updateorder',
                    method: 'POST',
                    data: $data
                });
            }
        });
    }


    $('.select2').select2({
        tags: true
    });

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