<?php
require_once '../layout/header.php';
?>

<div id="ver_turno">
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
								<h1><span class="badge bg-secondary" id="ventanilla">-------------------</span></h1>
							</div>
							<div class="col">
								<h1>-------------------</h1>
							</div>
							<div class="col">
								<h1><span class="badge bg-secondary" id="turno">-------------------</span></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require_once '../layout/footer.php';
?>

<script type="module" src="../../../public/js/turno/main.js"></script>