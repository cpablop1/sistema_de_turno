import { host } from "../config.js";
export function desactivarVentanilla(id, estado) {
	fetch(`${host}/app/controllers/ventanilla/VentanillaController.php?id=${id}&estado=${estado}`, {
	}).then(response => response.json())
		.then(data => {
            //let estado = data.data[0].estado;
            //document.getElementById('btn_salir_mdl_ventanilla_usuario').setAttribute('estado', estado);
		});
}