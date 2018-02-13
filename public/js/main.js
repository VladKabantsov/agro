/**
 * Created by vlad on 08.02.18.
 */
$(document).ready(function () {

    var num_of_orders = 0; //this variable use for setup id of order in check list

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

        if (goods_number>0 && tags!="") {
            num_of_orders++;
            $('.list-of-goods ').after("<div class='row'><div class='col-md-6'>"
                + tags +
                "</div><div class='col-md-6'>"
                + goods_number +
                "<a class='btn btn-danger pull-right'>x</a>" +
                "</div>" +
                "</div>");
            $('.check-list div:first a:first').attr('id', num_of_orders);
            // $('.check-list a:first').attr('id', num_of_orders);
        }
    });

    /*delete goods from cart*/
    $('a.btn-danger').on( "click", function() {
        console.log("norm");
        console.log($(this).getAttribute('id'));
    });

    /*value to autocomplete*/
    $( function() {
        var availableTags = window.goods_name;

        $( "#tags" ).autocomplete({
            source: availableTags
        });
    } );

    
    /*open and close ul list*/
    $('#list > li').click(function (event) {
        $(this).children("ul").slideToggle();
        event.stopPropagation();
    });

    /*open sub categories ul*/
    $('.active').closest("ul").css({'display':'block'}); //


    /*confirm delete*/
    $('.delete').on("click", function(){
        return confirm('Вы уверены?');
    });

    $(".deleteNotActive").on("click", function(){
        $(".deleteNotActive").submit(false);
        alert("Вы не можете удалить товар который есть на складе!!!");
    });

});

$(document).on('click', '.btn-danger', function(event) {

    $(this).parent().parent().remove();
});