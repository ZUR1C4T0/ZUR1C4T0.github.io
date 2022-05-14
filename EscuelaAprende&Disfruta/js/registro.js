$(document).ready(function () {
  // Formulario
  const form = $("#formulario")[0];
  
  //Expresiones regulares
  const regexp = {
    nombre: new RegExp("^[a-zA-ZÀ-ÖØ-öø-ÿ]{4,}.?(( |-)[a-zA-ZÀ-ÖØ-öø-ÿ]+.?)*$"),
    email: new RegExp(
      "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$"
    ),
    contrasena: new RegExp(
      "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d{3,})(?=.*[!@#$%^&*_-])([A-Za-z\\d!@#$%^&*_-]|[^ ]){8,}$"
    ),
  };

  // Función que se ejecta cuando los datos son invalidos
  const esInvalido = (input, mensaje) => {
    $(input).removeClass("is-valid");
    $(input).addClass("is-invalid");
    $(input).nextAll(".invalid-feedback").text(mensaje);
    return false;
  };

  // Función que se ejecta cuando los datos son validos
  const esValido = (input, mensaje) => {
    $(input).removeClass("is-invalid");
    $(input).addClass("is-valid");
    mensaje
      ? $(input).nextAll(".valid-feedback").text(mensaje)
      : (mensaje = "");
    return true;
  };

  // Función que valida Nombres
  function validarNombre() {
    const input = form.nombre;

    if (input.value.length === 0) {
      return esInvalido(input, "Este campo no puede estar vacío");
    }

    if (!regexp.nombre.test(input.value)) {
      return esInvalido(input, "Nombre invalido");
    }

    if (regexp.nombre.test(input.value)) {
      return esValido(input, "Nombre valido");
    }
  }

  // Función que valida Correo
  function validarCorreo() {
    const input = form.email;

    if (input.value.length === 0) {
      return esInvalido(input, "Este campo no puede estar vacío");
    }

    if (!regexp.email.test(input.value)) {
      return esInvalido(input, "Correo invalido");
    }

    if (regexp.email.test(input.value)) {
      return esValido(input, "Correo valido");
    }
  }

  // Función que valida Contraseña
  function validarClave() {
    const input = form.contrasena;

    if (input.value.length === 0) {
      return esInvalido(input, "Este campo no puede estar vacío");
    }

    if (!regexp.contrasena.test(input.value)) {
      return esInvalido(
        input,
        "La clave debe contener al menos: 8 carácteres, 1 Mayúscula, 1 Minúscula, 3 Números y 1 Caracter especial"
      );
    }

    if (regexp.contrasena.test(input.value)) {
      return esValido(input, "Contraseña valida");
    }
  }

  // Función que valida Confirmación de la Contraseña
  function validarConfirmacion() {
    const input = form.confirmacion;

    if (input.value.length === 0) {
      return esInvalido(input, "Este campo no puede estar vacío");
    }

    if (input.value !== form.contrasena.value) {
      return esInvalido(input, "La contraseña no coincide");
    }

    if (input.value === form.contrasena.value) {
      return esValido(input, "La contraseña coincide");
    }
  }

  // Función que valida Tipo de Usuario
  function validarTipo() {
    const select = form.tipo;

    if (select.value.length === 0) {
      return esInvalido(select, "Selectione una opción valida");
    }

    return esValido(select);
  }

  // función que valida Términos y Condiciones
  function validarTerminos() {
    const check = form.terminos;

    if (check.checked) {
      return esValido(check);
    }

    if (!check.checked) {
      return esInvalido(check, "Este campo es obligatorio");
    }
  }

  // Declaracion de eventos para cada entrada de dato
  $(form.nombre).blur(validarNombre);
  $(form.email).blur(validarCorreo);
  $(form.contrasena).blur(validarClave);
  $(form.confirmacion).blur(validarConfirmacion);
  $(form.tipo).blur(validarTipo);
  form.terminos.addEventListener("click", validarTerminos);

  // Se valida todo al momento de dar click en continuar
  $(form).submit(() => {
    let validarTodo = [
      validarNombre(),
      validarCorreo(),
      validarClave(),
      validarConfirmacion(),
      validarTipo(),
      validarTerminos(),
    ];

    return validarTodo.every((validacion) => validacion === true) ? true : false;
  });
});
// 185 154 150