import { host } from "./config.js";
document.getElementById('reiniciar_todo').addEventListener('click', () => {
    fetch(`${host}/app/controllers/ventanilla/VentanillaController.php?reiniciar_todo=reiniciar_todo`)
    setTimeout(() => window.location = `${host}/app/views/ventanilla/ver.php`, 500);
})