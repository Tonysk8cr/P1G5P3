
const boton1 = document.getElementById("IngresoCliente");
boton1.addEventListener("click", function(){
    try
    {
        Swal.fire({
            title: "AVISO",
            text: "El ingreso del cliente fue exitoso!!!",
            icon: "success"
        });

    }
    catch (error)
    {
        Swal.fire({
            title: "AVISO",
            text: "El ingreso del cliente no fue exitoso. Por favor intente de nuevo o contacte un administrador",
            icon: "error"
        });
    }

})