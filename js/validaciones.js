//Validacion de nombre (no debe quedar en blanco)
$(document).ready(function(){
    $("form").submit(function(){
        var nombre = $("#nombre_apellido").val();
        if (nombre === "") {
            alert("El nombre no puede estar vacío");
            return false;
        }
    });
});

//validacion de alias
$(document).ready(function(){
    $("form").submit(function(){
        var alias = $("#alias").val();
        var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/;
        if (!regex.test(alias)) {
            alert("El alias debe ser sin espacios, contener al menos 5 caracteres, incluyendo letras y números");
            return false;
        }
    });
});

//validacion de rut
function validarRut(rut) {
    if (typeof rut !== 'string') {
        return false;
    }

    var regex = /^[0-9]+-[0-9kK]{1}$/;
    if (!regex.test(rut)) {
        return false;
    }

    var parts = rut.split('-');
    var dv = parts[1];
    var rutBody = parts[0];

    var suma = 0;
    var multiplo = 2;

    for (var i = rutBody.length - 1; i >= 0; i--) {
        suma += parseInt(rutBody.charAt(i)) * multiplo;
        multiplo = multiplo % 7 === 0 ? 2 : multiplo + 1;
    }

    var resto = suma % 11;
    var dvEsperado = 11 - resto;
    if (dvEsperado === 11) {
        dvEsperado = '0';
    } else if (dvEsperado === 10) {
        dvEsperado = 'K';
    }

    return dv.toString().toUpperCase() === dvEsperado.toString().toUpperCase();
}

function validarFormulario() {
    var rutInput = document.getElementById('rut').value;
    if (validarRut(rutInput)) {
        return true; // Permite enviar el formulario si el RUT es válido
    } else {
        alert('RUT inválido. Por favor, ingrese un RUT válido');
        return false; // Evita que el formulario se envíe si el RUT es inválido
    }
}

//validacion de correo
$(document).ready(function(){
    $("form").submit(function(){
        var email = $("#email").val();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            alert("El correo electrónico ingresado no es válido.");
            return false;
        }
    });
});


//relacion region , comuna
$(document).ready(function(){
    $("select[name='region']").change(function(){
        var regionId = $(this).val();
        $.ajax({
            url: 'get_comunas.php', // Ruta a tu script PHP que obtiene comunas
            type: 'GET',
            data: { region_id: regionId },
            success: function(response) {
                $("select[name='comuna']").html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

// debe elegir al menos dos opciones del checkbox
$(document).ready(function(){
    $("form").submit(function(){
        var checkedCount = $("input[name='metodo[]']:checked").length;
        if (checkedCount < 2) {
            alert("Por favor, elija al menos dos opciones, por las cuales se entero");
            return false;
        }
    });
});
