<!DOCTYPE html>
<html>
<head>
	<title>Formato Walmart Universal</title>
	<meta charset="utf-8">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jspdf.js"></script>
	<script src="../js/pdfFromHTML.js"></script>
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
			height: auto;
			text-align: right;
		}
		.coresponda{
			margin-top: 80px;
			width: 100%;
			height: auto;
			text-align: left;
		}

		.coresponda nav{
			font-size: 9px;
			width: 50%;
		}
		.presente{
			margin-top: 10px;
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
			margin-top: 50px;
			width: 100%;
			height: auto;
			margin-bottom: 17em;
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

		.empleado{
			text-align: center;
			float: right;
		}

		.space{
			margin-top: 50px;
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
		<div class="presente">Estimados Señores:</div>
		<div  class="par">
			<p>
			Nos Permitimos confirmarles, que a partir de esta fecha y hasta el día <b><?php echo Mayus(fechaCastellano($FV));?></b>
			llevaremos a cabo la <b><?php echo $puesto;?></b> de diversos productos en su Unidad <b><?php echo $sucursal;?></b>, en virtud del contrato que tenemos celebrado con <b><?php echo $cliente;?></b>, por conducto de nuestro(a) trabajador(a) <b><?php echo $nombre;?></b>, quien se encuentra bajo nuestra dirección, supervición y dependencia y cuyos datos a continuación se detallan.
			</p>
		</div>

		<div class="list">
			<label>RFC del promotor: <b><?php echo $rfc;?></b></label><br>
			<label>Numero de Seguridad Social del IMSS: <b><?php echo $imss;?></b></label><br>
			<label>Nombre del Supervisor: <b><?php echo $supervisor;?></b></label>
		</div>

		<div class="files">
			<label>Horarios: <b class="time">De 30 A 45 MIN. DENTRO DE SU UNIDAD.</b></label><br>
			<label><b>SE ANEXA COPIA DE VIGENCIA DE IMSS</b></label><br>
			<LABEL><b>SE ANEXA COPIA DE IDENTIFICACIÓN OFICIAL</b></LABEL>
		</div>

		<div class="par">
			<p>
				Ahora bien debido a que tanto mi representante (a) como <?php echo $cadena;?> (en adelante WAL MART) son partes contratantes totalmente independientes que solo tienen negocios de carácter mercantil y que no existe ningún nexo o relación obrero-patronal entre ambas, seremos responsables de pago de sueldos, salarios, cuotas al SAR, IMSS, INFONAVIT, y demás impuestos, derechos y obligaciones que se causen con mótivo del desarrollo de las actividades de la persona indicada.
			</p>
		</div>

		<div class="par">
			<p>
				Derivado de lo anterior se entenderá que bajo ningún tipo de circunstancia WAL-MART podrá se considerada como responsable de los antes descrito. Obligandose así a EL PROVEEDOR a notificar a WAL*MART de forma inmediata de cualquier prejuicio o reclamación de carácter laboral, individual y colectivo que intente el personal o los ex empleados de EL PROVEEDOR, en su contra o en contra de WAL*MART; obligándose a EL PROVEEDOR sacar paz y a salvo a WAL*MART, dentro de un plazo que no excederá de sesenta días naturales a partir de la fecha en que tenga conocimiento de tales juicios y reclamaciones.
			</p>
		</div>

		<div class="par">
			<p>
				Asimismo, esta empresa se compromete a que la persona que se envíe a la Unidad <b><?php echo $sucursal;?></b>, <b>respetará</b> los horarios y costumbres comerciales de la unidad, sin que lo anterior signifique subordinación de la demostradora para con la <b><?php echo $cadena;?></b>.
			</p>
		</div>

		<div class="par">
			<p>
				Sin otro particular por el momento, y agradeciendo de antemano la atención que se sirvan dispensar el contenido de la presente, quedamos de ustedes.
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
						<label><b><?php echo tipo($puesto);?></b></label><br>
						<div class="space">
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