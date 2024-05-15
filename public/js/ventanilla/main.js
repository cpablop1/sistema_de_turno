import crearVentanilla from './crear.js';

document.getElementById('crear_ventanilla').addEventListener('click', () => {
    new bootstrap.Modal(document.getElementById('mdl_crear_ventanilla')).show();
});

document.getElementById('btn_crear_ventanilla').addEventListener('click', () => {
    crearVentanilla();
});