import { listarCanciones, buscarCanciones } from "./canciones.js";
import { validarSesion } from "./validarSesion.js";
import { validarRegistro } from "./validarRegistro.js";

(() => {
  // Función que aplica la clase "active" al correspondiente item del menú de navegación
  const localizacion = location.href;
  const menuEnlaces = document.querySelectorAll(".navbar-nav a");

  menuEnlaces.forEach((link) => {
    if (localizacion.includes(link.href)) {
      link.classList.add("active");
    }
  });
})();

if (location.href.includes("canciones.html")) {
  listarCanciones();
  buscarCanciones();
}

if (location.href.includes("inicio-de-sesion.html")) {
  validarSesion();
}

if (location.href.includes("registro.html")) {
  validarRegistro();
}
