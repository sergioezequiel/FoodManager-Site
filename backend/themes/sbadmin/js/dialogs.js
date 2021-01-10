"use strict";

function alertPermissions(url, userid) {
    Swal.fire({
        title: 'Mudar permissões',
        html: '<p>Explicação das roles:</p><br><p>Admin: Acesso a tudo</p><p>Gestor: Gere os Produtos e Feedback</p><p>Moderador: Gere o Feedback e os Utilizadores</p><p>Editor: Gere as Receitas</p><p>Utilizador: Não tem acesso ao backoffice</p>',
        icon: 'info',
        input: 'select',
        inputOptions: ['Admin', 'Gestor', 'Moderador', 'Editor', 'Utilizador'],
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if(result.isConfirmed) {
            window.location.href = url + "?id=" + userid + "&permission=" + result.value;
        }
    });
}