import { host } from "../config.mjs";
function crearVentanilla() {
	fetch(`${host}/app/controllers/ventanilla/VentanillaController.php`, {
	})
		.then(response => response.json())
		.then(data => {
			/** Procesar los datos **/
			if (data.data) {
				alert(data.msg);
				bootstrap.Modal.getInstance(document.getElementById('mdl_crear_ventanilla')).hide();
			}
		});
}

export default crearVentanilla;