<?php
require_once '../layout/header.php';
?>

<style>
	/* Estilos para la impresión */
.ticket-container{
    display: none;
}

@media print {
		.navbar, .imprimir{
			display: none;
		}

    .ticket-container {
        display:block;
        width: 300px;
        /* Ancho del ticket */
        margin: 0 auto;
        /* Centrar horizontalmente */
        text-align: center;
        /* Alinear texto al centro */
        font-family: Arial, sans-serif;
        /* Fuente */
        border: 1px solid #ccc;
        /* Borde */
        padding: 20px;
        /* Espaciado interno */
    }

    h1 {
        font-size: 1.2em;
        /* Tamaño de fuente */
        margin: 10px 0;
        /* Espaciado */
    }

    hr {
        border: none;
        /* Sin borde */
        border-top: 1px dashed #000;
        /* Línea punteada */
        margin: 10px 0;
        /* Espaciado */
    }
}

</style>

<div class="imprimir">
    <div class="d-flex justify-content-center align-items-center full-height">
        <h1 class="mt-5">
            <span role="button" class="badge bg-primary fs-1" id="imprimir_ticket">Imprimir</span>
        </h1>
    </div>
    <div class="d-flex justify-content-center align-items-center full-height">
        <h1 class="fs-1">🖨</h1>
    </div>
    <div class="d-flex justify-content-center align-items-center full-height">
        <h1 class="fs-1"><span class="badge bg-secondary" id="turno">Turno -----</span></h1>
    </div>
</div>

<div class="ticket-container">
	<h1>
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
			<path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916zM12.375 6v7h-1.25V6zm-2.5 0v7h-1.25V6zm-2.5 0v7h-1.25V6zm-2.5 0v7h-1.25V6zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2M.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1z" />
		</svg>
		Banco Azteca
	</h1>
	<h1>Servicio al cliente</h1>
	<hr>
	<h1>TURNO</h1>
	<h1 id="turno_ticket">-----</h1>
	<hr>
</div>

<?php
require_once '../layout/footer.php';
?>

<script type="module" src="../../../public/js/ticket/main.js"></script>