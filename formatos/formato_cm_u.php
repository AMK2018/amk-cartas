<!DOCTYPE html>
<html>
<head>
	<title>Formato Comercial Mexicana</title>
	<meta charset="utf-8">
	<script src="../js/jquery.min.js"></script>
	<style type="text/css">
		body{
			font-size: 12px;
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
			margin-top: 50px;
			width: 100%;
			height: 100%;
			text-align: right;
		}
		.coresponda{
			margin-top: 80px;
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
			margin-top: 20px;
			text-align: justify;
		}

		.files{
			width: 100%;
			height: auto;
		}
		.files label .time{
			margin-left: 50px;
		}
		.firmas{
			margin-top: 20px;
			width: 100%;
			height: auto;
			margin-bottom: 10em;
		}
		.firmas .container{
			width: 80%;
			height: auto;
			margin: 0 auto;
		}
		.empresa{
			text-align: center;
			float: left;
		}

		.empresa img{
			position: relative;
			width: 200px;
			height: 100px;
			bottom: 80px;
			transform: rotate(-15deg);
		}

		.empleado{
			text-align: center;
			float: right;
		}

		.space{
			margin-top: 40px;
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

	$FE =$_POST['FE'];
	$FV =$_POST['FV'];
 	$puesto = Mayus($_POST['puestos']);
 	$cadena = Mayus($_POST['cadenas']);
 	$sucursal = Mayus($_POST['sucursales']);
 	$direccion = Mayus($_POST['direccion']);
 	$cliente = Mayus($_POST['cliente']);
 	$producto = Mayus($_POST['producto']);
 	$dep = Mayus($_POST['departamento']);
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

	function tipo($p){
		switch ($p) {
			case 'PROMOTORÍA':
				return "PROMOTOR(A)";
				break;
			case 'DEMOSTRACIÓN':
				return "DEMOSTRAOR(A)";
				break;
			case 'SUPERVICIÓN':
				return "SUPERVISOR(A)";
			break;
		}
	}
?>
	<div class="doc">
		<img id="logo" src="../<?php echo $srclogo;?>">
		<div class="lf"><b><?php echo "CIUDAD DE MEXICO. A ".Mayus(fechaCastellano($FE));?></b></div>
		<div class="coresponda"><b><?php echo $cadena;?><br><?php echo $sucursal;?></b><br><nav><?php echo $direccion;?></nav></div>
		<div class="presente"><b>P R E S E N T E</b></div>
		<div  class="par">
			<p>
			POR MEDIO DE LA PRESENTE SOLICITAMOS LA AUTORIZACIÓN PARA QU EL/LA SR/SRITA. <b><?php echo $nombre;?></b> SEA LA PERSONA QUE REALICE LA FUNCIÓN DE <b><?php echo $puesto;?></b> DE LOS PRODUCTOS <b><?php echo $producto;?></b> DE LA COMPAÑÍA <b><?php echo $cliente;?></b> EN EL DEPARTAMENTO DE <b><?php echo $dep;?></b>, CON NUMERO DE SEGURO SOCIAL <b><?php echo $imss;?></b> R.F.C. <b><?php echo $rfc;?></b> A PARTIR DEL DIA <b><?php echo Mayus(fechaCastellano($FE))." HASTA EL ".Mayus(fechaCastellano($FV));?></b>.
			</p>
		</div>

		<div class="par">
			<p>
				LA PERSONA ANTES MENCIONADA TIENE CELEBRADO CON <?php echo MAYUS($e_name);?> CON RFC <?php echo MAYUS($e_rfc);?> Y REGISTRO PATRONAL ANTE EL IMSS <?php echo MAYUS($e_regpat);?>, UN CONTRATO INDIVIDUAL DE TRABAJO, POR LO QUE SE ENCUENTRA BAJO NUESTRA SUPERVISIÓN Y DEPENDENCIA.
			</p>
		</div>

		<div class="par">
			<p>
				POR LO ANTERIOR SOMO TOTALMENTE RESPONSABLES DE TODA RELACIÓN LABORAL, PAGO DE SALARIOS, PRESTACIONES DE LEY, AFILIACIÓN Y PAGOS AL INSTITUTO MEXICANO DEL SEGURO SOCIAL, CUOTAS AL INFONAVIT, SAR E IMPUESTOS POR PRODUCTOS DEL TRABAJO Y DEMPÁS DERECHOS QUE CAUSEN CON MOTIVO DEL CONTRATO INDIVIDUAL DEL TRABAJO QUE DICHA PERSONA TIENE CELEBRADO CON NOSOTROS.
			</p>
		</div>

		<div class="par">
			<p>
				POR LO TANTO <?php echo $cadena;?> EN NINGÚN MOMENTO Y BAJO NINGÚN MOTIVO PODRÁN SER CONSIDERADAS COMO RESPONSABLES DE LO ANTES MENCIONADO Y NOSOTROS NOS OBLIGAMOS A TERMINAR LA RELACIÓN DE TRABAJO EN PAZ Y A SALVO DE CUALQUIER JUICIO O RECLAMACIÓN QUE SE INTENTE EN SU CONTRA.
			</p>
		</div>

		<div class="par">
			<p>
				POR ÚLTIMO, NOS PERMITIMOS CONFIRMARLES QUE LA PERSONA DE QUE SE TRATA CUBRIRÁ UN HORARIO DE <b>30 A 45 MINUTOS</b> DENTRO DE SU UNIDAD.
			</p>
		</div>

		<div class="par">
			<p>
				SIN OTRO PARTICULAR POR EL MOMENTO, Y AGRADECIENDO DE ANTEMANO LA ATENCION PRESTADA A LA PRESENTE, QUEDAMOS DE USTEDES.
			</p>
		</div>

		<div class="firmas">
			<b>
				<div class="container">
					<div class="empresa">
						<label>A T E N T A M E N T E</label><br>
						<div class="space">
							<label><?php echo MAYUS($e_boss);?></label><br>
							<label><?php echo MAYUS($e_name);?></label>
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
						<label><b><?php echo tipo($puesto);?></b></label><br>
						<div class="space">
							<label><?php echo $nombre;?></label>
						</div>
					</div>
				</div>
			</b>
		</div>

		<div class="par confirm_sign">
			<p >
				Vo, Bo,. Jefe de Sección <br>
				Nombre, Seccíon y Firma __________________________________________________________________________
			</p>
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