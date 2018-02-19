/**
 * Created by vlad on 08.02.18.
 */
$(document).ready(function () {

    var num_of_orders = 0; //this variable use for setup id of order in check list
    var goodsFromDb = window.goods_params;
    amountCheckList = 0; //Finally amount in check list
    idCheckList = [];


    /*autocomplete input*/
    if (window.goods_params !== undefined) {
        $(function () {
            var availableTags = [];

            goodsFromDb.forEach(function callback(value, index, array) {
                availableTags[index] = value['name'];
            });

            $("#tags").autocomplete({source: availableTags});
        });
    }


    /*add goods to check and write to array id of element*/
    $( ".btn-add" ).on( "click", function() {

        var tags = $('#tags').val();
        var goods_number = $('#goods-number').val();
        var goodsPrice;
        var idCurrentButtonAdd = $(this).attr('id');

        if (goods_number>0 && tags!="") {

            goodsFromDb.forEach(function callback(value, index, array) {
                if (tags==value['name']) {
                    goodsPrice = value['price'];
                    if (idCurrentButtonAdd==undefined){
                        idCurrentButtonAdd = value['id'];
                    }
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
            $('.btn-danger:last').attr('id', idCurrentButtonAdd);
            amountCheckList += goods_number*goodsPrice;
            // $('.check-list tr:first a:first').attr('id', num_of_orders);
            $('#amount').append().text(amountCheckList+" грн");
        }
        idCheckList.push(idCurrentButtonAdd);
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
    /**
     * function send data to handler where calculate numbers of goods and sum of money
     */
    $('.confirm').on("click", function() {
        var id = 32;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST', // Type of response and matches what we said in the route
            url: '/vendor/calculate', // This is the url we gave in the route
            data: {'id' : idCheckList}, // a JSON object to send back
            success: function(response){ // What to do if we succeed
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

});

/*Delete goods from check-list and minus from amount*/
$(document).on('click', '.btn-danger', function(event) {
    console.log(idCheckList);
    var objectOfRow = $(this).parents('tr');
    var goodsNumber = objectOfRow.find('td:nth-child(2)').text();
    var goodsPrice = objectOfRow.find('td:nth-child(3)').text();
    var id = parseInt($(this).attr('id'), 10);
    // console.log('id = ', id, ' array = ', idCheckList);
    // console.log(typeof(id), Array.isArray(idCheckList));
    // console.log($.inArray(id, idCheckList));
    var indexOfElement = $.inArray(id, idCheckList);
    if (indexOfElement != -1) {
        idCheckList.splice(idCheckList.indexOf(indexOfElement), 1);
    }
    amountCheckList -= goodsNumber*goodsPrice;
    console.log(idCheckList);
    $('#amount').append().text(amountCheckList+" грн");
    $(this).parents('tr').remove();
});