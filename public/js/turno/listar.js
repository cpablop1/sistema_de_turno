import { host } from "../config.js";
export function listarTurno() {
    fetch(`${host}/app/controllers/turno/TurnoController.php`, {
    }).then(response => response.json())
        .then(data => {
            let listar = '';
            let ver_turno = document.getElementById('ver_turno');
            Array.from(data.data, (values, index) => {
                console.log(values);
                listar += `
                <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../../public/img/cola.png" class="img-fluid rounded-start" alt="..." style="max-width: 100px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Card title</h5> -->
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h1><span class="badge bg-secondary" id="turno">Turno ${values.turno}</span></h1>
                                    </div>
                                    <div class="col">
                                        <h1>----------</h1>
                                    </div>
                                    <div class="col">
                                        <h1><span class="badge bg-secondary" id="ventanilla">Ventanilla ${values.id_ventanilla}</span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                `;
            });
            ver_turno.innerHTML = listar;
        });
}