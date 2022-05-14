(() => {
  const tBodyLg = document.getElementById("tBodyLg");
  const tBodySm = document.getElementById("tBodySm");
  const $fragment1 = document.createDocumentFragment();
  const $fragment2 = document.createDocumentFragment();

  const ajax = new XMLHttpRequest();
  ajax.open("GET", "./datos.json");
  ajax.send();
  ajax.addEventListener("load", () => {
    if (ajax.status === 200) {
      const json = JSON.parse(ajax.responseText).canciones;
      json.sort((i, j) => j.reproducciones - i.reproducciones);

      for (let i = 0; i < 3; i++) {
        let tr1 = document.createElement("tr");
        tr1.innerHTML = `
            <td >
                <h4 class="text-primary text-capitalize">${json[i].nombre}</h4>
            </td>
            <td>
                <audio src="./canciones/${json[i].ruta}" controls>
            </td>`;
        let clone1 = tr1.cloneNode(true);
        $fragment1.appendChild(clone1);

        let tr2 = document.createElement("tr");
        tr2.innerHTML = `
            <td>
                <h4 class="text-primary text-capitalize">${json[i].nombre}</h4>
                <audio class="w-100" src="./canciones/${json[i].ruta}" controls></audio>
            </td>`;
        let clone2 = tr2.cloneNode(true);
        $fragment2.appendChild(clone2);
      }
      tBodyLg.appendChild($fragment1);
      tBodySm.appendChild($fragment2);
    }
  });
})();
