/**
 * Created by user on 01.03.18.
 */

$(document).ready(function () {

    var num_of_orders = 0; //this variable use for setup id of order in check list
    var goodsFromDb = window.goods_params;
    var availableTags = window.goodsName;
    amountCheckList = 0; //Finally amount in check list
    checkList = [];

    /*autocomplete input*/
    if (window.goods_params !== undefined) {
        // $(function () {
        //
        //     goodsFromDb.forEach(function callback(value, index, array) {
        //         availableTags[index] = value['name'];
        //     });
            console.log(availableTags);
            // console.log(availableTags);
            // $("#tags").autocomplete({source: availableTags});
        // });
    }
    //
    /*value to autocomplete*/
    // $( function() {
    //     var availableTags = window.goods_name;
    //
    //     $( "#tags" ).autocomplete({
    //         source: availableTags
    //     });
    // });

    $('#tags').autoComplete({
        minChars: 1,
        source: function(term, suggest){
            term = term.toLowerCase();
            var choices = ['ActionScript', 'AppleScript', 'Asp'];
            var matches = [];
            for (i=0; i<availableTags.length; i++)
                if (~availableTags[i].toLowerCase().indexOf(term)) matches.push(availableTags[i]);
            suggest(matches);
        }
    });

    /*add goods to check and write to array id and numbers of element*/
    $( ".btn-add" ).on( "click", function() {

        var tags = $('#tags').val();
        var goods_number = $('#goods-number').val();
        var goodsPrice;
        var idCurrentButtonAdd = $(this).attr('id');
        var subArray = {};

        if (!checkFields()) {

            goodsFromDb.forEach(function callback(value, index, array) {
                if (tags==value['name']) {
                    goodsPrice = value['price'];
                    if (idCurrentButtonAdd==undefined){
                        idCurrentButtonAdd = value['id'];
                    }
                }
            });
            console.log('checkRepeatedGoodsInCheck = ', checkRepeatedGoodsInCheck(checkList, idCurrentButtonAdd));
            if (!checkRepeatedGoodsInCheck(checkList, idCurrentButtonAdd)) {
                num_of_orders++;
                $('.list-of-goods ').append("<tr>" +
                    "<td>"
                    + tags +
                    "</td>" +
                    "<td>"
                    + goods_number +
                    "</td>" +
                    "<td>" +
                    + goodsPrice +
                    "</td>" +
                    "<td>" +
                    "<a class='btn btn-danger'>x</a>" +
                    "</td>" +
                    "</tr>");

                amountCheckList += goods_number * goodsPrice;
                $('#amount').append().text(amountCheckList + " грн");
                subArray.id = idCurrentButtonAdd;
                subArray.number = goods_number;
                checkList.push(subArray);
                $('.btn-danger:last').attr('id', checkList.length - 1);
            } else {
                showMessage(window.errorMessages['errorQuantity']);
            }
        } else {
            lightErrorInputs();
        }

    });

    function checkRepeatedGoodsInCheck(list, id)
    {
        var numberOfGoods = $('.ui-widget').find('#goods-number').val();
        var returnFlag;
        var goodsQuantity;
        list.forEach(function callback(value, index, array) {
            if (id == value['id']) {
                goodsFromDb.forEach(function callback(value, index, array) {
                    if (id==value['id']) {
                        goodsQuantity = value['quantity'];
                    }
                });

                var Quantity = numberOfGoods + value['number'];
                if (numberOfGoods+Quantity<goodsQuantity) {
                    $('.list-of-goods tr').find('')
                } else {

                }

            }
        });

        return returnFlag;
    }
    
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
            data: {'goods' : checkList}, // a JSON object to send back
            success: function(response){ // What to do if we succeed
                console.log(response);
                $('#ajaxResponseVendor').show(500);
                setTimeout(function() {
                    clearCheckList();
                }, 1500);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

    /**
     * Function clear all inputs and check-list after dispatch ajax request for confirm order
     */
    function clearCheckList()
    {
        $('#ajaxResponseVendor').hide(500);
        $('#tags').val('');
        $('#goods-number').val('');
        $('.list-of-goods tr').remove();
        amountCheckList = 0;
        checkList = [];
        $('#amount').append().text(amountCheckList+" грн");
    }

    /**
     * Show message for Agent
     */
    function showSuccesMessage()
    {
        $('.message').show(500);
        setTimeout(function() {
            $('.message').hide(500);
        }, 2500);
    }

    /*check fields*/
    function checkFields()
    {
        var nameOfGoods = $('.ui-widget').find('#tags');
        var numberOfGoods = $('.ui-widget').find('#goods-number');
        var errorFlag = false;
        var goodsQuantity;


        /*value in input should be not empty and be in the list of goods*/
        if ((nameOfGoods.val()!='') && ($.inArray(nameOfGoods.val(), availableTags)!==-1)) {
            goodsFromDb.forEach(function callback(value, index, array) {
                if (nameOfGoods.val()==value['name']) {
                    goodsQuantity = value['quantity'];
                }
            });
            /*number of goods must be bigger than quantity in the warehouse */
            if ((goodsQuantity>0) && (goodsQuantity>=numberOfGoods.val())) {
                nameOfGoods.removeClass('errorField');
            } else {
                nameOfGoods.addClass('errorField');
                showMessage(window.errorMessages['errorQuantity']);
                errorFlag = true;
            }
        } else {
            nameOfGoods.addClass('errorField');
            showMessage(window.errorMessages['errorName']);
            errorFlag = true;
        }

        /*value should be number, little than quantity of goods*/
        if ($.isNumeric(numberOfGoods.val()) && numberOfGoods.val()>0) {
            numberOfGoods.removeClass('errorField');
        } else {
            numberOfGoods.addClass('errorField');
            showMessage(window.errorMessages['errorQuantityIs0']);
            errorFlag = true;
        }

        return errorFlag;
    }

    /*light error input*/
    function lightErrorInputs()
    {
        $('.ui-widget').find('.errorField').css({
            'border':'2px solid red',
            'border-radius':'5px',
            'transition':'0.5s'
        });
        // delete light after 0.5 second
        setTimeout(function(){
            $('.ui-widget').find('.errorField').removeAttr('style');
        },1500);
    }

    /*show error message*/
    function showMessage(message)
    {
        $('.input-error').append("<p>"+message+"</p>");
        $('.input-error').show(500);
        setTimeout(function() {
            $('.input-error').hide(500);
            $('.input-error p').remove();
        }, 2500);
    }


});

/*Delete goods from check-list and minus from amount*/
$(document).on('click', '.btn-danger', function(event) {

    var objectOfRow = $(this).parents('tr');
    var goodsNumber = objectOfRow.find('td:nth-child(2)').text();
    var goodsPrice = objectOfRow.find('td:nth-child(3)').text();
    var id = parseInt($(this).attr('id'), 10);

    checkList.splice(id, 1);

    amountCheckList -= goodsNumber*goodsPrice;
    $('#amount').append().text(amountCheckList+" грн");
    $(this).parents('tr').remove();
});