const filas = Array.from(document.querySelectorAll("tbody > *"));
const selectFila = Array.from(document.querySelector('[name="row"]'));
const selectCol = Array.from(document.querySelector('[name="col"]'));

filas.forEach((filas, indexFil) => {
  const fila = filas.querySelectorAll("td");

  fila.forEach((columna, indexCol) => {
    columna.addEventListener("click", () => {
      selectFila.forEach((option) => {
        option.removeAttribute("selected");
      });
      selectFila[indexFil + 1].setAttribute("selected", " ");

      selectCol.forEach((option) => {
        option.removeAttribute("selected");
        selectCol[indexCol + 1].setAttribute("selected", " ");
      });
    });
  });
});
