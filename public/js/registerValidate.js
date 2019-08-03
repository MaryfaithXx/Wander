// Capturamos al formulario
var theForm = document.querySelector('form');

// Obtenemos todos los campos, pero parseamos la colección a un Array
var formInputs = Array.from(theForm.elements);

// Sacamos la 1er posición del array que es el un <input> hidden del token
formInputs.shift();

// Sacamos al último elemento que es el <button>
formInputs.pop();

// Expresión regular para validar formato de email
var regexEmail = /\S+@\S+\.\S+/;

// Expresión regular para validar formato de contraseña
var regexPassword =/.{6,}DH/;

// Objeto literal para verificar si un campo tiene error
var errorsObj = {};

// Recorremos el array y asignamos la validación básica
formInputs.forEach(function (oneInput) {
	// A cada campo le asignamos el evento blur y su funcionalidad
	oneInput.addEventListener('blur', function () {
		// Pregunto si el campo está vacío (previo trimeo de espacios)
		if (this.value.trim() === '') {
			// Si el campo está vacío, le agrego la clase 'is-invalid'
			this.classList.add('is-invalid');
			// Ademas, al <div> con clase 'invalid-feedback' le agremamos el texto de error
			this.nextElementSibling.innerHTML = 'El campo <b>' + this.getAttribute('dataname') + '</b> es obligatorio';
			// Si un campo tiene error, creamos una key con el nombre del campo y valor true
			errorsObj[this.name] = true;
		} else {
			// Cuando el campo NO está vacío

			// Quitamos la clase de error SI existiera
			this.classList.remove('is-invalid');

			// Si la data es correcta, asignamos esta clase de bootstrap
			this.classList.add('is-valid');

			// Al mensaje de error le sacamos el texto
			this.nextElementSibling.innerHTML = '';

			// Si un campo NO tiene error, eliminamos la key del objeto y su valor
			delete errorsObj[this.name];

			// Validamos el tipo de dato del campo Name
			if (this.name === 'name') {
				// Validamos que el texto insertado NO supere las 100 letras
				if (this.value.length > 100) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'El Nombre y apellido debe ser inferior a 100 letras';
					// Si un campo tiene error, creamos una key con el nombre del campo y valor true
					errorsObj[this.name] = true;
					}
				}

			// Validamos el tipo de dato del campo Username
			if (this.name === 'username') {
				// Validamos que el texto insertado NO supere las 100 letras
				if (this.value.length > 100) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'El Nombre de usuario debe ser inferior a 100 letras';
					// Si un campo tiene error, creamos una key con el nombre del campo y valor true
					errorsObj[this.name] = true;
					}
				}


			// Validamos el campo Email para verificar que tenga un formato valido
			if (this.name === 'email') {
				if (!regexEmail.test(this.value.trim())) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'El formato ingresado no es válido';
					// Si un campo tiene error, creamos una key con el nombre del campo y valor true
					errorsObj[this.name] = true;
				}
			}

			// Validamos el campo Password para verificar que tenga un formato valido
			if (this.name === 'password') {
				if (!regexPassword.test(this.value.trim())) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'La contraseña debe ser de más de 5 caracteres y contener las letras DH';
					// Si un campo tiene error, creamos una key con el nombre del campo y valor true
					errorsObj[this.name] = true;
				}
			}

			if (this.name === 'avatar') {
				var imagenSubida = this.value;
				var extension = imagenSubida.substring(imagenSubida.lastIndexOf('.') + 1).toLowerCase();
				console.log(extension);

				if(extension != 'jpg' && extension != 'jpeg' && extension != 'png' ) {
					this.classList.add('is-invalid');
	        this.nextElementSibling.innerHTML = 'La extension no es valida, debe ser jpg, jpeg, png';
	        errorsObj[this.name] = true;
        }
    	}
		}
	});

});

// Si tratan de enviar el formulario
theForm.addEventListener('submit', function (event) {
	// Al momento de SUBMITEAR el formulario iteramos los campos y validamos si están vacíos
	formInputs.forEach(function (input) {
		if (input.value.trim() === '') {
			// Si el campo está vacío creamos dentro del objeto de errores una key con valor true
			errorsObj[input.name] = true;
			// Asiganmos la clase de CSS
			input.classList.add('is-invalid');
			// Mostramos el mensaje de error
			input.nextElementSibling.innerHTML = 'El campo <b>' + input.getAttribute('dataname') + '</b> es obligatorio';
		}
	});

/* Debug de errores en Registro
	console.log('Campos con errores:', errorsObj);
	console.log('Cantidad de campos con errores:', Object.keys(errorsObj).length); */

	// Si el objeto que contiene los errores NO está vacío evitamos que se SUBMITEE el formulario
	if (Object.keys(errorsObj).length > 0) {
		event.preventDefault();
	}
});
