import crearVentanilla from './crear.mjs';
import listarVentanilla from './listar.mjs';
import activarVentanilla from './activar.mjs';
import desactivarVentanilla from './desactivar.mjs';
import siguienteTurno from './siguienteTurno.mjs';
import emitirPitido from './emitirPitido.mjs';
import emitirTurno from './emitirTurno.mjs';

window.onload = () => {
	listarVentanilla();
}

document.getElementById('crear_ventanilla').addEventListener('click', () => {
	new bootstrap.Modal(document.getElementById('mdl_crear_ventanilla')).show();
});

document.getElementById('btn_crear_ventanilla').addEventListener('click', () => {
	crearVentanilla();
});


document.getElementById('ventanilla').addEventListener('click', (e) => {
	if (!isNaN(parseInt(e.target.id))) {
		activarVentanilla(e.target.id);
		new bootstrap.Modal(document.getElementById('mdl_ventanilla_usuario')).show();
		document.getElementById('btn_siguiente_turno').setAttribute('id_ventanilla', e.target.id);
		let num = (parseInt(e.target.id) >= 10) ? `<i class="bi bi-${e.target.id.charAt(0)}-square-fill"></i><i class="bi bi-${e.target.id.charAt(1)}-square-fill"></i>` : `<i class="bi bi-${e.target.id}-square-fill"></i>`;
		document.getElementById('titulo_modal').innerHTML = 'Ventanilla ' + num;
		setTimeout(() => listarVentanilla(), 500);
	}
});

document.getElementById('btn_salir_mdl_ventanilla_usuario').addEventListener('click', (e) => {
	bootstrap.Modal.getInstance(document.getElementById('mdl_ventanilla_usuario')).hide();
	desactivarVentanilla(e.target.getAttribute('id_ventanilla'), e.target.getAttribute('estado'));
	setTimeout(() => listarVentanilla(), 500);
});

document.getElementById('btn_siguiente_turno').addEventListener('click', (e) => {
	siguienteTurno(e.target.getAttribute('id_ventanilla'));
});

document.getElementById('btn_avisar_cliente').addEventListener('click', () => {
	emitirPitido();
	setTimeout(() => {
		emitirTurno();
	}, 500);
});