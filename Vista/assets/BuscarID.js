function ConsultarID(objetoId) {
    const tabla = document.querySelector("table tbody");
    if (!tabla || !objetoId) {
        console.warn("No se encontraron datos para mostrar.");
        return;
    }

    tabla.innerHTML = "";

    const fila = document.createElement("tr");

    fila.innerHTML = `
        <td>${objetoId.ID_FORMULARIO ?? ''}</td>
        <td>${objetoId.NOMBRE ?? ''}</td>
        <td>${objetoId.CEDULA ?? ''}</td>
        <td>${objetoId.TELEFONO ?? ''}</td>
        <td>${objetoId.CORREO ?? ''}</td>
        <td>${objetoId.OBSERVACIONES ?? ''}</td>
        <td>${objetoId.ENCARGADO ?? ''}</td>
        <td>${objetoId.DISPOSITIVO ?? ''}</td>
        <td>${objetoId.MODELO ?? ''}</td>
        <td>${objetoId.DIAGNOSTICO ?? ''}</td>
        <td>${objetoId.PRECIO ?? ''}</td>
        <td>${objetoId.ESTATUS ?? ''}</td>
        <td>${objetoId.FECHA_INGRESO ?? ''}</td>
    `;

    tabla.appendChild(fila);
}
