//Define las variables que necesites
const _proximos = $("#proximos")[0];
const _pasados = $("#pasados")[0];
const template = $("#templateCard")[0].content;
const fragment = document.createDocumentFragment();

$(document).ready(function () {
  //Carga los datos que estan en el JSON (info.json) usando AJAX
  $.get("./info.json", (datos) => {
    //Guarda el resultado en variables
    const fechaActual = datos.fechaActual;
    const eventos = datos.eventos;

    //Clasifica los eventos segun la fecha actual del JSON
    const eventosFuturos = eventos.filter((ev) => ev.fecha > fechaActual);
    const eventosPasados = eventos.filter((ev) => ev.fecha < fechaActual);

    //Ordena los eventos segun la fecha (los mas cercanos primero)
    eventosFuturos.sort((a, b) => new Date(a.fecha) - new Date(b.fecha));

    //Extrae solo dos eventos
    let _eventosFuturos = new Array();

    for (let i = 0; i < 2; i++) {
      _eventosFuturos.push(eventosFuturos[i]);
    }

    //Ordena los eventos segun la fecha (los mas cercanos primero)
    eventosPasados.sort((a, b) => new Date(b.fecha) - new Date(a.fecha));

    //Extrae solo dos eventos
    let _eventosPasados = new Array();

    for (let i = 0; i < 2; i++) {
      _eventosPasados.push(eventosPasados[i]);
    }

    //Se define función que suma una plantilla por cada evento
    const editarPlantilla = (paraCada, evento) => {
      $(".card-title", template).text(evento.nombre);
      $("[href]", template).attr("href", "./detalle.html?id=" + evento.id);
      $(".card-subtitle", template).text(
        evento.fecha.split("-").reverse().join("-")
      );
      $(".card-text", template).text(evento.descripcion);
      $(fragment).append($(template).clone());
    };

    //Recorre el arreglo y concatena el HTML para cada evento
    $.each(_eventosFuturos, editarPlantilla);

    //Modifica el DOM agregando el html generado
    $(_proximos).append(fragment);

    //Modifica el DOM agregando el html generado
    $(_proximos).append(fragment);

    //Recorre el arreglo y concatena el HTML para cada evento
    $.each(_eventosPasados, editarPlantilla);

    //Modifica el DOM agregando el html generado
    $(_pasados).append(fragment);
  });
});
