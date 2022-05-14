//Define las variables que necesites
const _pasados = $("#pasados")[0];
const fragment = document.createDocumentFragment();

$(document).ready(function () {
  //Carga los datos que estan en el JSON (info.json) usando AJAX
  $.get("./info.json", (datos) => {
    //Guarda el resultado en variables
    const fechaActual = datos.fechaActual;
    const eventos = datos.eventos;

    //Selecciona los eventos que sean anteriores a la fecha actual del JSON
    const eventosPasados = eventos.filter((ev) => ev.fecha < fechaActual);

    //Ordena los eventos segun la fecha (los mas recientes primero)
    eventosPasados.sort((a, b) => new Date(b.fecha) - new Date(a.fecha));

    //Crea un string que contenga el HTML que describe el detalle del evento
    const template = $("#templateCard")[0].content;

    //Recorre el arreglo y concatena el HTML para cada evento
    $.each(eventosPasados, (paraCada, evento) => {
      $(".card-title", template).text(evento.nombre);
      $("[href]", template).attr("href", "./detalle.html?id=" + evento.id);
      $(".card-subtitle", template).text(
        evento.fecha.split("-").reverse().join("-")
      );
      $(".card-text", template).text(evento.descripcion);
      $(fragment).append($(template).clone());
    });

    //Modifica el DOM agregando el html generado
    $(_pasados).append(fragment);
  });
});
