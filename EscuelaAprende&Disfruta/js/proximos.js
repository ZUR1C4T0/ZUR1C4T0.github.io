//Define las variables que necesites
const _proximos = $("#proximos")[0];
const fragment = document.createDocumentFragment();

$(document).ready(function () {
  //Carga los datos que estan en el JSON (info.json) usando AJAX
  $.get("./info.json", (datos) => {
    //Guarda el resultado en variables
    const fechaActual = datos.fechaActual;
    const eventos = datos.eventos;

    //Selecciona los eventos que sean posteriores a la fecha actual del JSON
    const eventosFuturos = eventos.filter((ev) => ev.fecha > fechaActual);

    //Ordena los eventos segun la fecha (los mas cercanos primero)
    eventosFuturos.sort((a, b) => new Date(a.fecha) - new Date(b.fecha));

    //Crea un string que contenga el HTML que describe el detalle del evento
    const template = $("#templateCard")[0].content;

    //Recorre el arreglo y concatena el HTML para cada evento
    $.each(eventosFuturos, (paraCada, evento) => {
      $(".card-title", template).text(evento.nombre);
      $("[href]", template).attr("href", "./detalle.html?id=" + evento.id);
      $(".card-subtitle", template).text(
        evento.fecha.split("-").reverse().join("-")
      );
      $(".card-text", template).text(evento.descripcion);
      $(fragment).append($(template).clone());
    });

    //Modifica el DOM agregando el html generado dentro del div con id=evento
    $(_proximos).append(fragment);
  });
});
