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
 	$puesto = Mayus($_POST['puestos']);
 	$cadena = Mayus($_POST['cadenas']);
 	$sucursal = Mayus($_POST['sucursales']);
 	$direccion = Mayus($_POST['direccion']);
 	$name = Mayus($_POST['name']);
 	$srclogo = $_POST['logoSRC'];
 	$srcsello = $_POST['selloSRC'];
 	$num = $_POST['empresa'];
    $sucsnum = $_POST['sucsNum'];
    $disp = $_POST['disp'];
    
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
		<img id="logo" src="../<?php echo $srclogo;?>"><br><br><br>
		<div class="lf"><b><?php echo "CIUDAD DE MEXICO. A ".Mayus(fechaCastellano($FE));?></b></div>
		<div class="coresponda">
            <b>
                <?php echo $cadena;?><br>
                
            </b><br>
            <ul>
                <?php 
                for($i = 1; $i <= $sucsnum; $i++){
                    echo "<li>".$_POST['item-'.$i]."</li>";
                }
                ?>
            </ul>
		</div>
		<div  class="par">
			<p>
			POR MEDIO DE LA PRESENTE, SOLICITAMOS LE PERMITAN INTRODUCIR EL TELEFONO CELEULAR <b><?php echo Mayus($disp); ?></b> A NUESTRO(A) <b><?php echo Mayus(tipo($puesto)); ?></b>, LA SRITA./EL SR. <b><?php echo Mayus($name); ?></b>, YA QUE ES DE VITAL IMPORTANCIA TENER CONTACTO CON EL, TOMAR FOTOGRAFIAS DE SU TRABAJO Y REPORTARSE EN TIEMPO REAL, LOS DÍAS QUE VISITE SUS TIENDAS PARA LLEVAR UN MEJOR CONTROL Y SEGUMIENTO DE DE SUS LABORES DENTRO DE LAS TIENDAS.
			</p>
		</div>


		<div class="par">
			<p>
				SIN MAS POR EL MOMENTO, ESTAMOS A SUS ORDENES PARA CUALQUIER DUDA O COMENTARIO.
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