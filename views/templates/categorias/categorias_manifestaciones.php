<div class="row py-3 pl-3 flex-column">
    <h1 class="display-4">Manifestación Ciudadana</h1>
    <p>Observa cada tipo de manifestación ciudadana y seleccione la que más se acerque a lo que quiere manifestar.
    </p>
</div>
<h4 class="pt-5 pb-1">Manifestaciones ciudadanas</h4>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
    <!--<div class="col mb-4">
        <a href="crearDenuncia.php?cat_den=17">
            <div class="card shadow w-100 h-100" style="border-color: #40b79d;">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <img src="../../assets/img/iconos/cohecho.png" class="card-img-top" alt="image">
                    <h5 class="card-title text-center mt-2">Denuncia</h5>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">
                        Denuncias por faltas no graves</p>
                </div>
            </div>
        </a>
    </div>-->
    <div class="col mb-4">
        <a href="crearDenuncia.php?cat_den=18">
            <div class="card shadow w-100 h-100" style="border-color: #f29200;">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <img src="../../assets/img/iconos/queja.png" class="card-img-top" alt="image">
                    <h5 class="card-title text-center mt-2">Queja</h5>
                </div>
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
        </a>
    </div>
    <div class="col mb-4">
        <a href="crearDenuncia.php?cat_den=19">
            <div class="card shadow w-100 h-100" style="border-color: #e62949;">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <img src="../../assets/img/iconos/peticion.png" class="card-img-top" alt="image">
                    <h5 class="card-title text-center mt-2">Petición</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Los asuntos relacionados con los programas sociales por parte de los ciudadanos
                        interesados a
                        efecto de recibir un beneficio o mejorar su ejecución.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col mb-4">
        <a href="crearDenuncia.php?cat_den=20">
            <div class="card shadow w-100 h-100" style="border-color: #791241;">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <img src="../../assets/img/iconos/mal_uso_vehiculo.png" class="card-img-top" alt="image">
                    <h5 class="card-title text-center mt-2">Mal uso de vehículo</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        El parque vehicular oficial es utilizado con fines ajenos a los institucionales.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col mb-4">
        <a href="crearDenuncia.php?cat_den=21">
            <div class="card shadow w-100 h-100" style="border-color: #94c120;">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <img src="../../assets/img/iconos/otros.png" class="card-img-top" alt="image">
                    <h5 class="card-title text-center mt-2">Otros</h5>
                </div>
                <div class="card-body">
                <p class="card-text">
                        Cualquier asunto que en carácter de ciudadano desea hacer del conocimiento de las
                        autoridades, asi como reconocimientos, felicitaciones y/o sugerencias.</p>
                </div>
            </div>
        </a>
    </div>
</div>
<br>
<br>
<div class="container">
    <h1 class="display-4">Buzones virtuales</h1>
    <p class="text-justify">
        La Secretaría de la Función Pública ha establecido en cada municipio del Estado buzones de quejas en
        donde podrá depositar sugerencias y quejas respecto al servicio o trabajo que algún funcionario público
        o dependencia realice.
        Ponemos a su disposición este buscador que le permitirá ubicar los buzones instalados en su municipio:
    </p>
</div>
<div class="cont">
    <div id="map">
    </div>
</div>
<div class="container">
    <div class="row d-flex flex-column">
        <label for="municipios">Seleccione un municipio:</label>
        <select name="municipios" id="municipios"></select>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover ">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del buzón</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="buzones">
                </tbody>
            </table>
        </div>
    </div>
</div>