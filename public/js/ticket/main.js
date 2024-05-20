import imprimirTicket from "./imprimir.mjs";

document.getElementById('imprimir_ticket').addEventListener('click', () => {
	imprimirTicket();
	setTimeout(() => window.print(), 100);
});