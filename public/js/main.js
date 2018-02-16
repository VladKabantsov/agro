/**
 * Created by vlad on 08.02.18.
 */
$(document).ready(function () {

    var num_of_orders = 0; //this variable use for setup id of order in check list
    var goodsFromDb = window.goods_params;
    amountCheckList = 0; //Finally amount in check list
    /*autocomplete input*/
    console.log(window.goods_params); // goods_name from VendorController
    if (window.goods_params !== undefined) {
        $(function () {
            var availableTags = [];

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
        var goodsPrice;
        if (goods_number>0 && tags!="") {

            goodsFromDb.forEach(function callback(value, index, array) {
                // console.log(value['price']);
                if (tags==value['name']) {
                    goodsPrice = value['price'];
                }
            });
            num_of_orders++;
            $('.list-of-goods ').append("<tr>" +
                "<td>"
                    + tags +
                "</td>" +
                "<td>"
                    + goods_number +
                "</td>" +
                "<td>" +
                    +goodsPrice+
                "</td>"+
                "<td>" +
                    "<a class='btn btn-danger'>x</a>"+
                "</td>"+
                "</tr>");
            amountCheckList += goods_number*goodsPrice;
            $('.check-list tr:first a:first').attr('id', num_of_orders);
            $('#amount').append().text(amountCheckList+" грн");
            // $('.check-list a:first').attr('id', num_of_orders);
        }
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

    /*confirm check-list*/
    $('.confirm').on("click", function() {
        //there should be accept to db
    });

});

/*Delete goods from check-list and minus from amount*/
$(document).on('click', '.btn-danger', function(event) {

    var objectOfRow = $(this).parents('tr');
    var goodsNumber = objectOfRow.find('td:nth-child(2)').text();
    var goodsPrice = objectOfRow.find('td:nth-child(3)').text();

    amountCheckList -= goodsNumber*goodsPrice;

    $('#amount').append().text(amountCheckList+" грн");
    $(this).parents('tr').remove();
});