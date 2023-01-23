function select_img() {
    let foto = document.getElementById('cad-foto');
    let arquivo = document.getElementById('input-foto');

    foto.addEventListener('click', () => {
        arquivo.click();
    });
}

function up_foto() {

    var formData = new FormData(document.getElementById("up_perfil_img"));
    $.ajax({
        type: 'POST',
        url: './cad_imagem.php',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

        },
        success: function(msg) {

            alert(msg);
            document.location.reload(true);

        }
    });
}