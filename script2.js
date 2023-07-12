// Realizar una solicitud al servidor para obtener los registros de la base de datos
fetch("mostrar_herramientas.php")
  .then((response) => response.json())
  .then((data) => {
    const tablaHerramientas = document.getElementById("tabla-herramientas");

    // Verificar si se obtuvieron datos de la base de datos
    if (data && data.length > 0) {
      // Recorrer los registros y generar las filas de la tabla
      data.forEach((herramienta) => {
        const fila = document.createElement("tr");
        fila.innerHTML = `
          <td>${herramienta.id}</td>
          <td>${herramienta.nombre}</td>
          <td>${herramienta.descripcion}</td>
          <td>${herramienta.cantidad}</td>
        `;
        tablaHerramientas.appendChild(fila);
      });
    } else {
      // Mostrar un mensaje si no hay registros en la base de datos
      const filaVacia = document.createElement("tr");
      filaVacia.innerHTML =
        '<td colspan="4">No se encontraron herramientas registradas.</td>';
      tablaHerramientas.appendChild(filaVacia);
    }
  })
  .catch((error) => {
    console.error("Error al obtener los datos:", error);
  });
