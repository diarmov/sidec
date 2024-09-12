<?php
include('../../db/db.php');
$link = connect();

if (isset($_POST['folio']) && !empty($_POST['folio'])){
	$folio = trim($_POST['folio']);
	$folio = $link->real_escape_string($folio);
	
	$query = "
			SELECT bitacora.id_bitacora,bitacora.id_clasificacion,bitacora.sistema_destino,bitacora.id_usuario,bitacora.fechaRegistro,cat_estatus.estatus as estatus
			FROM bitacora
			INNER JOIN cat_estatus ON bitacora.estatus_denuncia = cat_estatus.id
	 		WHERE folio_denuncia = '$folio'";
	if (!$resultado = $link->query($query)) {
		echo $link->error."<br>";
		exit;
	}else{
		if ($resultado->num_rows >= 1){
			echo '
				<div class="table-responsive rounded shadow text-center ">
                    <table class="table table-hover ">
                      <thead class="bg-success text-white">
                        <tr>
                          <th scope="col" width="150">No. de transacción</th>
                          <th scope="col">Estatus</th>
                          <th scope="col">Sistema destino</th>
                          <th scope="col">Usuario clasificador</th>
                          <th scope="col">Fecha de transacción</th>
                        </tr>
                      </thead>';
			while($detalleBitacora = $resultado->fetch_assoc()){
				echo '<tbody>
                        <tr>
						  <th>'.$detalleBitacora['id_bitacora'].'</th>
						  <td><span class="badge badge-pill badge-secondary '.$detalleBitacora['estatus'].'">'.$detalleBitacora['estatus'].'</span></td>';
                          if($detalleBitacora['sistema_destino'] == 1){
								echo '<td>SIRE</td>';
							}else if($detalleBitacora['sistema_destino'] == 2){
								echo '<td>SAC</td>';
							}else if($detalleBitacora['sistema_destino'] == 3){
							echo '<td>Desechada</td>';
							}else if($detalleBitacora['sistema_destino'] == null){
								echo '<td>Sin clasificar</td>';
							}

                          if($detalleBitacora['id_usuario'] != '' || $detalleBitacora['id_usuario'] != null){
                          	if (!$getUser = $link->query("SELECT nombre FROM usuarios WHERE id_usuario =".$detalleBitacora['id_usuario'])) {
                          		echo $link->error."<br>";
								              exit;
                          	}else{
                          		if($getUser-> num_rows >= 1){
                          			$user = $getUser->fetch_assoc();
                          			echo '<td>'.$user['nombre'].'</td>';
                          		}else{
                          			echo 'Sin clasificar';
                          		}
                          	}
                          }else{
                          	echo '<td>Sin clasificar</td>';
                          }
                          echo '<td>'.$detalleBitacora['fechaRegistro'].'</td>
                        </tr>
                      </tbody>';
			}
			echo '
					</table>
            	</div>';
		}else{
			echo '
				<div class="alert alert-danger col-6" role="alert">
  					No existe la denuncia con folio: '.$folio.'
				</div>';
		}

	}
}else{
	echo '
	<div class="alert alert-danger col-6" role="alert">
  		Debes ingresar un folio válido.
	</div>';
}