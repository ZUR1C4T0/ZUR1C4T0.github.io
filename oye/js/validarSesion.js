export function validarSesion()
{
const login = document.getElementById("login");
const regex =
  /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

login.correo.addEventListener("blur", validarCorreo);
login.contrasena.addEventListener("blur", validarContrasena);

login.addEventListener("submit", (e) => {
  validarCorreo();
  validarContrasena();
  let enviar = [validarCorreo(), validarContrasena()];
  
  if (!enviar.every((index) => index === true)) {
    e.preventDefault();
    return false;
  }
  return true;
});

function validarCorreo() {
  const correo = document.getElementById("correo");
  const error = document.querySelector("#correo ~ .invalid-feedback");

  if (correo.value.length === 0) {
    correo.classList.add("is-invalid");
    error.textContent = "Completa este campo";
    return false;
  } else if (!regex.test(correo.value)) {
    correo.classList.add("is-invalid");
    error.textContent = "Correo invalido";
    return false;
  } else {
    correo.classList.remove("is-invalid");
    return true;
  }
}

function validarContrasena() {
  const contrasena = document.getElementById("contrasena");
  const error = document.querySelector("#contrasena ~ .invalid-feedback");

  if (contrasena.value.length === 0) {
    contrasena.classList.add("is-invalid");
    error.textContent = "Completa este campo";
    return false;
  } else if (contrasena.value.length < 8) {
    contrasena.classList.add("is-invalid");
    error.textContent = "Este campo debe contener mínimo 8 caracteres";
    return false;
  }
  contrasena.classList.remove("is-invalid");
  return true;
}
}