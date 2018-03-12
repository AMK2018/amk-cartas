<!DOCTYPE html>
<html>
<head>
	<title>Formato Teindas Europeas</title>
	<meta charset="utf-8">
	<script src="../js/jquery.min.js"></script>
	<style type="text/css">
		body{
			font-size: 14px;
		}
		.doc{
			width: 80%;
			height: auto;
			margin: 0 auto;
		}
		.doc #logo{
			width: 35%;
			height: 100px;
			position: absolute;
			top:20px;
		}

		.lf{
			margin-top: 100px;
			width: 100%;
			height: 100%;
			text-align: right;
		}
		.coresponda{
			margin-top: 50px;
			width: 100%;
			height: auto;
			text-align: left;
			margin-bottom: 20px;
		}

		.coresponda nav{
			font-size: 9px;
			width: 50%;
		}

		.presente{
			width: 100%;
			height: auto;
			text-align: center;
		}
		.par{
			width: 100%;	
			height: auto;
			margin-top: 30px;
			text-align: justify;
		}

		.list{
			width: 100%;
			height: auto;
		}

		.files{
			width: 100%;
			height: auto;
		}
		.files label .time{
			margin-left: 50px;
		}
		.firmas{
			margin-top: 80px;
			width: 100%;
			height: auto;
			margin-bottom: 28em;
		}
		.firmas .container{
			width: 90%;
			height: auto;
			margin: 0 auto;
		}
		.empresa{
			text-align: center;
			float: left;
		}

		.empleado{
			text-align: center;
			float: right;
		}

		.space{
			margin-top: 40px;
		}

		.empresa img{
			position: relative;
			width: 200px;
			height: 100px;
			bottom: 120px;
			transform: rotate(-15deg);
		}
		.confirm_sign{
			position: absolute;
		}

		footer{
			position: absolute;
			bottom: 0;
			left: 0;
			right: 0;
			text-align: center;
		}
	</style>
</head>
<body>
<?php 
	require("inc.php");
	setlocale(LC_ALL, 'es_ES');
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	$FE = $_POST['FE'];
	$FV = $_POST['FV'];
 	$puesto = Mayus($_POST['puestos']);
 	$cadena = Mayus($_POST['cadenas']);
 	$sucursal = Mayus($_POST['sucursales']);
 	$direccion = Mayus($_POST['direccion']);
 	$cliente = Mayus($_POST['cliente']);
 	$np = Mayus($_POST['np']);
 	$surnames = Mayus($_POST['surnames']); 
 	$names = Mayus($_POST['names']);
 	$nombre = $surnames." ".$names;
 	$rfc = Mayus($_POST['rfc']);
 	$imss = Mayus($_POST['imss']);
 	$supervisor = Mayus($_POST['supervisores']);
 	$srclogo = $_POST['logoSRC'];
 	$srcsello = $_POST['selloSRC'];
 	$num = $_POST['empresa'];


 	if($num == "1"){
 		$e_name  = ENTERPRISE_NAME1;
 		$e_rfc = ENTERPRISE_RFC1;
 		$e_regpat = ENTERPRISE_REGPAT1;
 		$e_boss = ENTERPRISE_BOSS1;
 	}else if($num == "2"){
 		$e_name  = ENTERPRISE_NAME2;
 		$e_rfc = ENTERPRISE_RFC2;
 		$e_regpat = ENTERPRISE_REGPAT2;
 		$e_boss = ENTERPRISE_BOSS2;
 	}
 	
 	if(isset($_POST['sell'])){
	 	$isSell = $_POST['sell'];
	}

 	function fechaCastellano ($fecha) {
		$fecha = substr($fecha, 0, 10);
		$numeroDia = date('d', strtotime($fecha));
		$dia = date('l', strtotime($fecha));
		$mes = date('F', strtotime($fecha));
		$anio = date('Y', strtotime($fecha));
		$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$nombredia = str_replace($dias_EN, $dias_ES, $dia);
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		return $numeroDia." de ".$nombreMes." de ".$anio;
	}	
	function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöüñ","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÑ");
		return $variable;
	}
?>
	<div class="doc">
		<img id="logo" src="../<?php echo $srclogo;?>">
		<div class="lf"><b><?php echo "CIUDAD DE MEXICO. A ".Mayus(fechaCastellano($FE));?></b></div>
		<div class="coresponda"><b><?php echo $cadena;?><br><u><?php echo "SUC. ".$sucursal.".";?></u></b><br><nav><?php echo $direccion;?></nav></div>
		<div class="presente"><b>P R E S E N T E</b></div>
		<div  class="par">
			<p>
			POR MEDIO DE LA PRESENTE NOS PERMITIMOS INFORMAR A USTEDES QUE EL/LA SR/SRITA. <b><?php echo $nombre;?></b>, CON <b>RFC <?php echo $rfc;?> Y NUMERO DE SEGURO SOCIAL <?php echo $imss;?></b> EMPLEADO(A) DE NUESTRA COMPAÑÍA <?php echo Mayus($e_name);?> ES LA PERSONA PARA <b><?php echo $puesto;?></b> DE LOS PRODUCTOS DE NUESTRO CLIENTE <b><?php echo $cliente;?></b> CON NUMERO DE PROVEDOR <?php echo $np;?>. DEL <b><?php echo Mayus(fechaCastellano($FE))." HASTA EL ".Mayus(fechaCastellano($FV));?></b> EN ESTA CIUDAD.
			</p>
		</div>

		<div class="par">
			<p>
				DESEAMOS MANIFSTARLE QUE EL MENCIONADO SR. ES EMPLEADO DE NOSOTROS Y SOMOS LOS ÚNICOS RESPONSABLES DE LOS PROBLEMAS LABORALES QUE PUDIERAN PRESENTARSE CON EL, DEL PAGO DE IMPUESTOS SOBRE EL PRODUCTO DE TRABAJO, DE LA INSCRIPCIÓN Y PAGOS DE CUOTAS AL I.M.S.S. Y CUALQUIER OTRO PROBLEMA SIMILAR QUE PUDIERA PRESENTARSE RELEVÁNDOLOS DESDE AHORA DE CUALQUIER RESPONSABILIDAD.
			</p>
		</div>

		<div class="par">
			<p>
				ASÍ MISMO EL HORARIO AL CUAL SE SUJETARÁ SERÁ DE <b>30 A 45 MINUTOS</b> DENTRO DE LA SUCURSAL MENCIONADA.
			</p>
		</div>

		<div class="firmas">
			<b>
				<div class="container">
					<div class="empresa">
						<label>A T E N T A M E N T E</label><br>
						<div class="space">
							<label><?php echo Mayus($e_name);?></label><br>
							<label>R.F.C. <?php echo Mayus($e_rfc);?></label><br>
							<label>REG. PATRONAL. IMSS <?php echo Mayus($e_regpat);?></label>
						</div>
						<?php 
							if(isset($isSell)){
								if($isSell == "on"){
									echo '<img src="../'.$srcsello.'">';
								}
							}
						?>
					</div>
					<div class="empleado">
						<label>CONFORME</label><br>
						<div class="space">
							<label>_________________________________</label><br>
							<label><?php echo $nombre;?></label>
						</div>
					</div>
				</div>
			</b>
		</div>

		<footer>
			<p>Av. Plutarco Elias Calles No. 1482 Col. María del Carmen C.P. 03540, Benito Juárez, México, D.F. Tel/Fax: 5532626262/55326200</p>
			<p>
				amicusdemexico@yahoo.com.mx | amicusdemexico@live.com.mx
			</p>
	</footer>
	</div>
</body>
</html>