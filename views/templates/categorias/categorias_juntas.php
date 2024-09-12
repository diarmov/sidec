<?php
include('categorias_actos_corrupcion.php');

echo '
<div class="row py-3 pl-3 flex-column">
    <h1 class="display-4">Manifestación Ciudadana</h1>
    <p>Observa cada tipo de manifestación ciudadana y selecciona la que más se acerque a lo que quieres denunciar
    </p>
</div>
<h4 class="pt-3 pb-1">Manifestaciones ciudadanas</h4>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
<div class="col mb-4">
    <div class="card shadow w-100 h-100" style="border-color: #40b79d;">
        <a href="crearDenuncia.php?cat_den=17" class="d-flex align-items-center justify-content-center flex-column">
            <img src="../../assets/img/iconos/cohecho.png" class="card-img-top" alt="image">
            <h5 class="card-title text-center mt-2">Denuncia</h5>
        </a>
        <div class="card-body">
            <p class="card-text text-center">
                Denuncias por faltas no graves</p>
        </div>
    </div>
</div>
<div class="col mb-4">
    <div class="card shadow w-100 h-100" style="border-color: #40b79d;">
        <a href="crearDenuncia.php?cat_den=18" class="d-flex align-items-center justify-content-center flex-column">
            <img src="../../assets/img/iconos/cohecho.png" class="card-img-top" alt="image">
            <h5 class="card-title text-center mt-2">Queja</h5>
        </a>
        <div class="card-body">
            <p class="card-text">
                Relacionadas con el actuar del servidor público en relación a su trato o desempeño de
                sus funciones;
                sobre la
                ejecución y operación de programas sociales, obras públicas y/o cualquier actividad
                relacionada con
                la Administración pública..</p>
        </div>
    </div>
</div>
<div class="col mb-4">
    <div class="card shadow w-100 h-100" style="border-color: #40b79d;">
        <a href="crearDenuncia.php?cat_den=19" class="d-flex align-items-center justify-content-center flex-column">
            <img src="../../assets/img/iconos/cohecho.png" class="card-img-top" alt="image">
            <h5 class="card-title text-center mt-2">Petición</h5>
        </a>
        <div class="card-body">
            <p class="card-text">
                Los asuntos relacionados con los programas sociales por parte de los ciudadanos
                interesados a
                efecto de recibir un beneficio o mejorar su ejecución.</p>
        </div>
    </div>
</div>
<div class="col mb-4">
    <div class="card shadow w-100 h-100" style="border-color: #40b79d;">
        <a href="crearDenuncia.php?cat_den=20" class="d-flex align-items-center justify-content-center flex-column">
            <img src="../../assets/img/iconos/cohecho.png" class="card-img-top" alt="image">
            <h5 class="card-title text-center mt-2">Mal uso de vehículo</h5>
        </a>
        <div class="card-body">
            <p class="card-text">
                El parque vehicular oficial es utilizado con fines ajenos a los institucionales.</p>
        </div>
    </div>
</div>
<div class="col mb-4">
    <div class="card shadow w-100 h-100" style="border-color: #40b79d;">
        <a href="crearDenuncia.php?cat_den=21" class="d-flex align-items-center justify-content-center flex-column">
            <img src="../../assets/img/iconos/cohecho.png" class="card-img-top" alt="image">
            <h5 class="card-title text-center mt-2">Otros</h5>
        </a>
        <div class="card-body">
            <p class="card-text">
                Cualquier asunto que en carácter de ciudadano desea hacer del conocimiento de las
                autoridades.</p>
        </div>
    </div>
</div>
</div>';