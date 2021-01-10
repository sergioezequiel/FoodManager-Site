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

function alertPermissions() {
    Swal.fire({
        title: 'Mudar permissões',
        html: '<p>Explicação das roles:</p><br><p>Admin: Acesso a tudo</p><p>Gestor: Gere os produtos e Feedback</p><p>Moderador: Gere o Feedback e os utilizadores</p>',
        icon: 'info',
        input: 'select',
        inputOptions: ['Admin', 'Gestor', 'Moderador'],
        confirmButtonText: 'Cool'
    }).then((result) => {
        if(result.isConfirmed) {
            console.log(result);
        }
    });
}