import { imprimirTicket } from "./imprimir.js";

document.getElementById('imprimir_ticket').addEventListener('click', () => {
	imprimirTicket();
	setTimeout(() => window.print(), 100);
});