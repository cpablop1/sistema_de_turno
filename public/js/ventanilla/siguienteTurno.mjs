import { host } from "../config.mjs";
import emitirPitido from "./emitirPitido.mjs";
import emitirTurno from "./emitirTurno.mjs";
function siguienteTurno(id) {
	let data = {
		id_ventanilla: id,
		siguiente_turno: id
	}
	let data2 = JSON.stringify(data);
	fetch(`${host}/app/controllers/ventanilla/VentanillaController.php`, {
		method: 'POST', // Especifica que es una petición POST
		headers: {
			'Content-Type': 'application/json' // Asegúrate de establecer el Content-Type correcto si estás enviando JSON
		},
		body: data2
	})
		.then(response => response.json())
		.then(data => {
			/** Procesar los datos **/
			document.getElementById('atendiendo_turno').innerHTML = `Atendiendo el turno: ${data.data[0].turno}`;
			document.getElementById('atendiendo_turno').setAttribute('txt_turno', data.data[0].turno);
			document.getElementById('atendiendo_turno').setAttribute('txt_ventanilla', id);
			emitirPitido();
			setTimeout(() => {
				emitirTurno();
			}, 500);
		});
}

export default siguienteTurno;