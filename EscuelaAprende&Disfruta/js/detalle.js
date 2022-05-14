//Define las variables que necesites
const _evento = $("#evento")[0];

$(document).ready(function () {
  //Esta es la instruccion para tomar el id del URL detalle.html?id=<identificador>
  const idEnlace = Number(new URLSearchParams(location.search).get("id"));

  //Carga los datos que estan en el JSON (info.json) usando AJAX
  $.get("./info.json", (datos) => {
    //Guarda el resultado en una variable
    const eventos = datos.eventos;

    //Busca el elemento en el arreglo
    const evento = eventos.filter((ev) => ev.id === idEnlace)[0];

    //Crea un string que contenga el HTML que describe el detalle del evento
    const template = $("#templateCard")[0].content;

    //Modifica el DOM agregando el html generado dentro del div con id=evento
    $(".card-title", template).text(evento.nombre);
    $("#fecha", template).text(
      "Fecha: " + evento.fecha.split("-").reverse().join("-")
    );
    $("#lugar", template).text("Lugar: " + evento.lugar);
    $(".card-text", template).text(evento.descripcion);
    $("#costo", template).text("Costo: $" + evento.precio);
    $("#invitados", template).text("Invitados: " + evento.invitados);

    $(_evento).append(template);
  });
});
