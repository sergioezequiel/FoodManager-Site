"use strict";

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