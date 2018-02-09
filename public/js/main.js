/**
 * Created by vlad on 08.02.18.
 */
$(document).ready(function () {

    
    /*autocomplete input*/
    console.log(window.goods_name); // goods_name from VendorController
    $( function() {
        var availableTags = window.goods_name;

        $( "#tags" ).autocomplete({
            source: availableTags
        });
    } );

    $( "#btn-add" ).on( "click", function() {
        console.log( "add to check list" );
    });
    
    /*open and close ul list*/
    $('#list > li').click(function (event) {
        $(this).children("ul").slideToggle();
        event.stopPropagation();
    });


    /*open sub categories ul*/
    $('.active').closest("ul").css({'display':'block'}); //

});