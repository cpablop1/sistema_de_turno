import { host } from "../config.mjs";
function listarVentanilla() {
	let ventanilla = document.getElementById('ventanilla');
	ventanilla.innerHTML = '';
	let card = '';
	/* fetch(`${host}/app/controllers/ventanilla/VentanillaController.php`, {
	})
			.then(response => response.json())
			.then(data => {
					if (data.data) {
							alert(data.msg);
							bootstrap.Modal.getInstance(document.getElementById('mdl_crear_ventanilla')).hide();
					}
			}); */
	for (let i = 0; i < 15; i++) {
		let num = (i>=10) ? `<i class="bi bi-${i.toString().charAt(0)}-square-fill"></i><i class="bi bi-${i.toString().charAt(1)}-square-fill"></i>` : `<i class="bi bi-${i+1}-square-fill"></i>`;
		console.log(num);
		card += `
            <div class="col">
            <div class="card mt-3">
              <div class="card-header">
                <h5>
                    <b>Ventanilla ${num}</b>
                </h5>
              </div>
              <div class="card-body">
                <a href="#" class="btn btn-primary">Ingresar</a>
              </div>
            </div>
        </div>
            `;
	}
	ventanilla.innerHTML = card;
}

export default listarVentanilla;