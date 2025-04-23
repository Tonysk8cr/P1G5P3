function VerHistorialCliente(todos)
{
    console.log(todos); // Para que veas el JSON en consola

    const tabla = document.getElementById("tablaHistorial");
    //tabla.innerHTML = "";

    todos.forEach(item => {
        const fila = document.createElement("tr");

        fila.innerHTML = `
            <td>${item.ID_CLIENTE}</td>
            <td>${item.NOMBRE}</td>
            <td>${item.CEDULA}</td>
            <td>${item.TELEFONO}</td>
            <td>${item.CORREO}</td>
            <td>${item.OBSERVACIONES}</td>
            <td>${item.ENCARGADO}</td>
            <td>${item.DISPOSITIVO}</td>
            <td>${item.MODELO}</td>
            <td>${item.DIAGNOSTICO}</td>
            <td>${item.PRECIO}</td>
            <td>${item.STATUS}</td>
            <td>${item.FECHA_INGRESO}</td>
        `;

        tabla.appendChild(fila);
    });
}