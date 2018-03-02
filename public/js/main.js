/**
 * Created by vlad on 08.02.18.
 *
 */
$(document).ready(function () {

    // $('#tags').autoComplete({key1: "as", key2: "sf"});
    /*open and close ul list*/
    $('.menu > li').click(function (event) {
        $(this).children("ul").slideToggle();
        event.stopPropagation();
    });

    /*open and close ul list*/
    $('#list > li').click(function (event) {
        // $(this).children("ul").slideToggle();
        event.stopPropagation();
    });

    /*add goods to input name of goods*/
    $('.products-name > li > a').on('click', function(event) {
        event.stopPropagation();
        var productName = $(this).text();
        $('#tags').val(productName);
    });
    /*open sub categories ul*/
    $('.active').closest("ul").css({'display':'block'});

    
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

