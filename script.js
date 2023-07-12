function filtrarHerramientas() {
  var input = document.getElementById("filtro").value.toUpperCase();
  var table = document.getElementById("tabla-herramientas");
  var rows = table.getElementsByTagName("tr");

  for (var i = 0; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var match = false;

    for (var j = 0; j < cells.length; j++) {
      var cellText = cells[j].textContent || cells[j].innerText;
      if (cellText.toUpperCase().indexOf(input) > -1) {
        match = true;
        break;
      }
    }

    if (match) {
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}
