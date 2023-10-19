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
            alert("El alias debe contener al menos 5 caracteres, incluyendo letras y números");
            return false;
        }
    });
});

//validacion de rut

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
