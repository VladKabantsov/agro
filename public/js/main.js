/**
 * Created by vlad on 08.02.18.
 */
$(document).ready(function () {

    
    /*autocomplete input*/
    console.log(window.goods_params); // goods_name from VendorController
    if (window.goods_params !== undefined) {
        $(function () {
            var availableTags = [];
            var goodsFromDb = window.goods_params;
            goodsFromDb.forEach(function callback(value, index, array) {
                availableTags[index] = value['name'];
            });

            $("#tags").autocomplete({
                source: availableTags
            });
        });
    }

    /*add goods to check*/
    $( "#btn-add" ).on( "click", function() {
        var tags = $('#tags').val();
        var goods_number = $('#goods-number').val();
        $('.list-of-goods').after("<div class='row'><div class='col-md-6'>"
            +tags+
            "</div><div class='col-md-6'>"
            +goods_number+
            "<a class='btn btn-danger pull-right'>x</a>" +
            "</div>" +
            "</div>");
    });

    /*delete goods from cart*/
    $( ".btn-danger" ).on( "click", function() {
        
    });

    /*open and close ul list*/
    $('#list > li').click(function (event) {
        $(this).children("ul").slideToggle();
        event.stopPropagation();
    });

    /*open sub categories ul*/
    $('.active').closest("ul").css({'display':'block'}); //

});