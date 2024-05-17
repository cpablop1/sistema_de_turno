import crearVentanilla from './crear.mjs';
import listarVentanilla from './listar.mjs';
window.onload = () => {
	console.log('ñasjfñlsadjflk');
	listarVentanilla();
}

document.getElementById('crear_ventanilla').addEventListener('click', () => {
	new bootstrap.Modal(document.getElementById('mdl_crear_ventanilla')).show();
});

document.getElementById('btn_crear_ventanilla').addEventListener('click', () => {
	crearVentanilla();
});