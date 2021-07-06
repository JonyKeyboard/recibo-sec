/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

$(function(){

    $('#cpf').mask("000.000.000-00", {placeholder: "___.___.___-__"});
    $('#cnpj').mask("00.000.000/0000-00", {placeholder: "__.___.___/____-__"});
    $('#cep').mask("00000-000", {placeholder: "_____-___"});

});
//preview de imagens
/* $(function(){
    $('#imageFiliado').change(function(){
        const file = ($(this)[0].files[0]);
        const fileReader = new FileReader();
        fileReader.onloadend = function(){
            $('#img').attr('src', fileReader.result);
        }
        fileReader.readAsDataURL(File);
    })
}); */

