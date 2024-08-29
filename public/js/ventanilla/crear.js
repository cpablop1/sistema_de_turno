import { host } from "../config.js";
import { listarVentanilla } from "./listar.js";
export function crearVentanilla() {
	fetch(`${host}/app/controllers/ventanilla/VentanillaController.php`, {
		method: 'POST', // Especifica que es una petición POST
		headers: {
			'Content-Type': 'application/json' // Asegúrate de establecer el Content-Type correcto si estás enviando JSON
		},
		body: JSON.stringify({
			// Aquí puedes agregar los datos que quieres enviar en el cuerpo de la solicitud
			key1: 'value1',
			key2: 'value2'
		})
	})
		.then(response => response.json())
		.then(data => {
			/** Procesar los datos **/
			if (data.data) {
				alert(data.msg);
				bootstrap.Modal.getInstance(document.getElementById('mdl_crear_ventanilla')).hide();
				setTimeout(() => listarVentanilla(), 500);

			}
		});
}