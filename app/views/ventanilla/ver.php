<?php
require_once '../layout/header.php';
?>

<h1 class="d-flex justify-content-end text-primary"><i role="button" id="crear_ventanilla" class="bi bi-plus-square-fill"></i></h1>
<div class="container">
    <div class="row" id="ventanilla">
        <div class="col">
            <div class="card">
              <div class="card-header">
                <h2>
                    <b>Ventanilla # <i class="bi bi-1-square-fill"></i></b>
                </h2>
              </div>
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
        </div>
    </div>
</div>

<?php
include './crear.php';
?>

<?php
require_once '../layout/footer.php';
?>

<script type="module" src="../../../public/js/ventanilla/main.js"></script>