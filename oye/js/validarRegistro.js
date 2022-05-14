export function validarRegistro() {
  const register = document.getElementById("register");
  const regex =
    /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

  register.correo.addEventListener("blur", validarCorreo);
  register.contrasena.addEventListener("blur", validarContrasena);
  register.contrasena2.addEventListener("blur", validarContrasena2);
  register.generoFavorito.addEventListener("blur", validarGeneroFavorito);
  register.terminos.addEventListener("click", validarTerminos);

  register.addEventListener("submit", (e) => {
    let validarTodo = [
      validarCorreo(),
      validarContrasena(),
      validarContrasena2(),
      validarGeneroFavorito(),
      validarEdad(),
      validarTerminos(),
    ];

    if (!validarTodo.every((index) => index === true)) {
      e.preventDefault();
      return false;
    }
    console.info("enviado");
    return true;
  });

  function validarCorreo() {
    const correo = document.getElementById("correo");
    const validSpan = document.querySelector("#correo ~ .valid-feedback");
    const invalidSpan = document.querySelector("#correo ~ .invalid-feedback");

    if (correo.value.length === 0) {
      correo.classList.remove("is-valid");
      correo.classList.add("is-invalid");
      invalidSpan.textContent = "Completa este campo";
      return false;
    } else if (!regex.test(correo.value)) {
      correo.classList.add("is-invalid");
      invalidSpan.textContent = "Correo invalido";
      return false;
    } else {
      correo.classList.remove("is-invalid");
      correo.classList.add("is-valid");
      validSpan.textContent = "Correo valido";
      return true;
    }
  }

  function validarContrasena() {
    const contrasena = document.getElementById("contrasena");
    const validSpan = document.querySelector("#contrasena ~ .valid-feedback");
    const invalidSpan = document.querySelector(
      "#contrasena ~ .invalid-feedback"
    );

    if (contrasena.value.length === 0) {
      contrasena.classList.remove("is-valid");
      contrasena.classList.add("is-invalid");
      invalidSpan.textContent = "Completa este campo";
      return false;
    } else if (contrasena.value.length < 8) {
      contrasena.classList.remove("is-valid");
      contrasena.classList.add("is-invalid");
      invalidSpan.textContent = "Este campo debe contener mínimo 8 caracteres";
      return false;
    }
    contrasena.classList.remove("is-invalid");
    contrasena.classList.add("is-valid");
    validSpan.textContent = "Contraseña valida";
    return true;
  }

  function validarContrasena2() {
    const contrasena = document.getElementById("contrasena");
    const contrasena2 = document.getElementById("contrasena2");
    const invalidSpan = document.querySelector(
      "#contrasena2 ~ .invalid-feedback"
    );
    const validSpan = document.querySelector("#contrasena2 ~ .valid-feedback");

    if (contrasena2.value.length === 0) {
      contrasena2.classList.remove("is-valid");
      contrasena2.classList.add("is-invalid");
      invalidSpan.textContent = "Completa este campo";
      return false;
    } else if (contrasena2.value !== contrasena.value) {
      contrasena2.classList.remove("is-valid");
      contrasena2.classList.add("is-invalid");
      invalidSpan.textContent = "La contraseña no coincide";
      return false;
    }
    contrasena2.classList.remove("is-invalid");
    contrasena2.classList.add("is-valid");
    validSpan.textContent = "La contraseña coincide";
    return true;
  }

  function validarGeneroFavorito() {
    const generoFavorito = document.getElementById("generoFavorito");
    const invalidSpan = document.querySelector(
      "#generoFavorito ~ .invalid-feedback"
    );

    if (generoFavorito.value === "" || generoFavorito.value === null) {
      generoFavorito.classList.remove("is-valid");
      generoFavorito.classList.add("is-invalid");
      invalidSpan.textContent = "Debe seleccionar un género musical";
      return false;
    }
    generoFavorito.classList.remove("is-invalid");
    generoFavorito.classList.add("is-valid");
    return true;
  }

  function validarEdad() {
    const edad = Array.from(document.querySelectorAll('[name="edad"]'));
    const invalidSpan = document.querySelector(
      ".ratio-group > .invalid-feedback"
    );

    if (!edad.some((index) => index.checked)) {
      invalidSpan.classList.add("d-block");
      invalidSpan.textContent = "Debe seleccionar un rango de edad";
      return false;
    }
    invalidSpan.classList.remove("d-block");
    return true;
  }

  function validarTerminos() {
    const terminos = document.getElementById("terminos");
    const invalidSpan = document.querySelector("#terminos ~ .invalid-feedback");

    if (!terminos.checked) {
      terminos.classList.remove("is-valid");
      terminos.classList.add("is-invalid");
      invalidSpan.textContent = "Debe aceptar los términos";
      return false;
    }
    terminos.classList.remove("is-invalid");
    terminos.classList.add("is-valid");
    return true;
  }
}
