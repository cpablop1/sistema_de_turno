import { host } from "../config.js";

export function imprimirTicket() {
	console.log('Imprimiendo Ticket...');

	fetch(`${host}/app/controllers/ticket/TicketController.php`, {
	}).then(response => response.json())
		.then(data => {
			let numero = parseInt(data.data[0].numero);
			document.getElementById('turno').innerHTML = numero + 1;
			document.getElementById('turno_ticket').innerHTML = numero;
		});


	//window.print();
}