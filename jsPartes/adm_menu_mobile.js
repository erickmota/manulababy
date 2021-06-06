$( "#iconeMenu" ).click(function() {
    $("#fundoAreaMenuMobile").css("display", "block");
    $("#fundoAreaMenuMobile").animate({
        opacity: "0.2"
    }, 100 );
    $( "#areaMenuMobile" ).animate({
        width: "256px",
        left: "0px"
    }, 100 );
    $( "#listaMenuMobile" ).fadeIn();
});

$( "#fundoAreaMenuMobile" ).click(function() {
    $("#fundoAreaMenuMobile").animate({
        opacity: "0.0"
    }, 100 );
    $("#fundoAreaMenuMobile").css("display", "none");
    $( "#areaMenuMobile" ).animate({
        width: "0px",
        left: "-50px"
    }, 100 );
    $( "#listaMenuMobile" ).fadeOut("fast");
});