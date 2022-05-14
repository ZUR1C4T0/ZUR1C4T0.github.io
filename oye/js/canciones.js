export function listarCanciones() {
  const lista = document.getElementById("lista");
  const $fragment = document.createDocumentFragment();

  const ajax = new XMLHttpRequest();
  ajax.open("GET", "./datos.json");
  ajax.send();
  ajax.addEventListener("load", () => {
    if (ajax.status === 200) {
      const json = JSON.parse(ajax.responseText).canciones;

      json.forEach((el) => {
        let div = document.createElement("div");
        div.classList.add("col");
        div.innerHTML = `
      <div class="card">
          <img src="./imagenes/icon_${el.icono}.svg" class="card-img-top bg-secondary" alt="icono" height="125">
          <div class="card-body">
              <h5 class="card-title text-capitalize text-center">${el.nombre}</h5>
              <audio class="w-100" src="./canciones/${el.ruta}" controls></audio>
          </div>
      </div>`;
        let clone = div.cloneNode(true);
        $fragment.appendChild(clone);
      });
      lista.appendChild($fragment);
    }
  });
}

export function buscarCanciones() {
  const buscador = document.getElementById("buscador");

  buscador.addEventListener("keyup", (e) => {
    const canciones = Array.from(document.querySelectorAll("#lista .col"));

    if (e.key === "Escape") {
      buscador.value = "";
    }

    canciones.forEach((cancion) => {
      const titulo = cancion.querySelector(".card-title").textContent.toLowerCase();

      if (!titulo.includes(e.target.value.toLowerCase())) {
        cancion.classList.add("d-none");
      } else {
        cancion.classList.remove("d-none");
      }
    });
  });

  buscador.parentElement.addEventListener("submit", (e) => {
    e.preventDefault();
  });
}
