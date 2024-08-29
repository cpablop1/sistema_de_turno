import { host } from "../config.js";
export function listarVentanilla() {
	let ventanilla = document.getElementById('ventanilla');
	ventanilla.innerHTML = '';
	let card = '';
	fetch(`${host}/app/controllers/ventanilla/VentanillaController.php`, {
	}).then(response => response.json())
		.then(data => {
			Array.from(data.data, (values, index) => {
				let num = (values.id_ventanilla >= 10) ? `<i class="bi bi-${values.id_ventanilla.toString().charAt(0)}-square-fill"></i><i class="bi bi-${values.id_ventanilla.toString().charAt(1)}-square-fill"></i>` : `<i class="bi bi-${values.id_ventanilla}-square-fill"></i>`;
				card += `
            <div class="col">
            <div class="card mt-3">
              <div class="card-header">
                <h5>
                    <b>Ventanilla ${num}</b>
                </h5>
              </div>
              <div class="card-body">
			  	<button class="btn btn-primary" id="${values.id_ventanilla}">Ingresar</button>
              </div>
            </div>
        </div>
            `;
			});
			ventanilla.innerHTML = card;
		});
}