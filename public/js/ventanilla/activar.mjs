import { host } from "../config.mjs";
function activarVentanilla(id) {
	fetch(`${host}/app/controllers/ventanilla/VentanillaController.php?id=${id}`, {
	}).then(response => response.json())
		.then(data => {
            let estado = data.data[0].estado;
			let id_ventanilla = data.data[0].id_ventanilla;
            document.getElementById('btn_salir_mdl_ventanilla_usuario').setAttribute('estado', estado);
            document.getElementById('btn_salir_mdl_ventanilla_usuario').setAttribute('id_ventanilla', id_ventanilla);
		});
}

export default activarVentanilla;