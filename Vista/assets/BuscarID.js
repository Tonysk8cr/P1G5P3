function Formu(objetoId) {
    //console.log(objetoId); // Confirmación en consola

    const tabla = document.querySelector("table tbody");
    if (!tabla || !objetoId) return;

    tabla.innerHTML = ""; // Limpiar tabla antes de agregar datos nuevos

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