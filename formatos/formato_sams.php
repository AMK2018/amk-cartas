<!DOCTYPE html>
<html>
<head>
	<title>Formato Sams</title>
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
		.presente{
			margin-top: 80px;
			width: 100%;
			height: auto;
			text-align: left;
		}
		.par{
			width: 100%;	
			height: auto;
			margin-top: 20px;
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
			margin-top: 20px;
			width: 100%;
			height: auto;
			margin-bottom: 12.5em;
		}
		.firmas .container{
			width: 80%;
			height: 100%;
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
			bottom: 170px;
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
		<div class="presente">ESTIMADOS SEÑORES:</div>
		<div  class="par">
			<p>
			NOS PERMITIMOS CONFIRMARLES, QUE A PARTIR DE ESTA FECHA Y HASTA EL DÍA <b><?php echo Mayus(fechaCastellano($FV));?></b>
			LLEVAREMOS A CABO LA <b><?php echo $puesto;?></b> DE DIVERSOS PRODUCTOS EN SU UNIDAD <b><?php echo $sucursal;?></b>, en VIRTUD DEL CONTRATO QUE TENEMOS CELEBRADO CON <b><?php echo $cliente;?></b>, POR CONDUCTO DE NUESTRO(A) TRABAJADOR(A) <b><?php echo $nombre;?></b>, QUIEN SE ENCUENTRA BAJO NUESTRA DIRECCIÓN, SUPERVICIÓN Y DEPENDENCIA EN AMICUS ED MEXICO S.A. DE C.V. Y CUYOS DATOS A CONTINUACIÓN SE DETALLAN.
			</p>
		</div>

		<div class="list">
			<label>RFC: <b><?php echo $rfc;?></b></label><br>
			<label>SEGURO SOCIAL: <b><?php echo $imss;?></b></label><br>
			<label>NOMBRE DEL SUPERVISOR: <b><?php echo $supervisor;?></b></label>
		</div>

		<div class="files">
			<label>HORARIOS: <b class="time">De 30 A 45 MIN. DENTRO DE SU UNIDAD.</b></label><br>
			<label><b>SE ANEXA COPIA DE IMSS</b></label><br>
			<LABEL><b>SE ANEXA COPIA DE IDENTIFICACIÓN OFICIAL</b></LABEL>
		</div>

		<div class="par">
			<p>
				AHORA BIEN DEBIDO A QUE TANTO MI REPRESENTANTE (A) COMO <b><?php echo $cadena;?></b> EN ADELANTE <b>WALMART</b>, SON PARTES CONTRATANTES TOTALMENTE INDEPENDIENTES QUE SOLO TIENEN NEGOCIOS DE CARÁCTER MERCANTIL Y QUE NO EXISTE NINGÚN TIPO DE RELACIÓN OBRERO-PATRONAL ENTRE AMBAS, SEREMOS RESPONSABLES DE PAGO DE SUELDOS, SALARIOS, CUOTAS AL SAR, IMSS, INFONAVIT, Y DEMÁS IMPUESTOS, DERECHOS Y OBLIGACIONES QUE SE CAUSEN CON MOTIVOS DEL DESARROLLO DE LAS ACTIVIDADES DE LA PERSONA INDICADA.
			</p>
		</div>

		<div class="par">
			<p>
				DERIVADO DE LO ANTERIOR SE ENTENDERA QUE BAJO NINGÚN TIPO DE CIRCUNSTANCIA <b>WAL-MART</b> NI SUS EMPRESAS RELACIONADAS FILIALES Y/O SUBSIDIARIAS COMO <b>OPERADORA WALMART S. DE R.L. DE C.V.</b> ENTRE OTRAS PODRA SE CONSIDERADA COMO RESPONSABLE DE LOS ANTES DESCRITO OBLIGANDOSE ASI A EL PROVEEDOR A NOTIFICAR A <b>WALMART</b> DE FORMA INMEDIATA DE CUALQUIER JUICIO O RELACION DE CARÁCTER LABORAL, INDIVIDUAL Y COLECTIVO QUE INTENTE EL PERSONAL O LOS EX EMPLEADOS DE EL PROVEEDOR, EN SU CONTRA O EN CONTRA DE <b>WALMART</b>, OBLIGÁNDOSE A EL PROVEEDOR SACAR PAZ Y A SALVO A <b>WALMART</b>, DENTRO DE UN PLAZO QUE NO EXCEDERA DE 60 DÍAS NATURALES A PARTIR DE LA FECHA EN QUE TENGA CONOCIMIENTO DE TALES JUICIOS Y RECLAMACIONES.
			</p>
		</div>

		<div class="par">
			<p>
				ASÍ MISMO, ESTA EMPRESA SE COMPROMETE A QUE LA PERSONA QUE SE ENVÍE A LA UNIDAD <b><?php echo $sucursal;?></b>, RESPETARA LOS HORARIOS Y COSTUMBRES COMERCIALES DE LA UNIDAD, SIN QUE LO ANTERIOR SIGNIFIQUE SUBORDINACION DE LA DEMOSTRADORA PARA CON <b><?php echo $cadena;?></b> NI SUS EMPRESAS RELACIONADAS, FILIALES Y/O SUBSIDIARIAS COMO <b>OPERADORA WALMART S. DE R.L. DE C.V.</b> ENTRE OTRAS.
			</p>
		</div>

		<div class="par">
			<p>
				SIN OTRO PARTICULAR POR EL MOMENTO, Y AGRADECIENDO DE ANTEMANO LA ATENCION QUE SE SIRVAN DISPENSAR EL CONTENIDO DE LA PRESENTE, QUEDAMOS DE USTEDES.
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