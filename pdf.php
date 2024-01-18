<?php
session_start();
use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '/Applications/XAMPP/xamppfiles/htdocs/Conexion/vendor/autoload.php';

$mail = new PHPMailer(true);
$correo = $_SESSION['correo'];

echo $correo;

$dompdf = new Dompdf();
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

try {
	$mail->SMTPDebug = 0;									 
	$mail->isSMTP();										 
	$mail->Host	 = 'smtp.gmail.com';				 
	$mail->SMTPAuth = true;							 
	$mail->Username = 'paola.permz@gmail.com';				 
	$mail->Password = 'gomh deze ftby kpun';

	$mail->SMTPSecure = 'tls';	
	$mail->Port	 = 587; 

	$mail->setFrom('paola.permz@gmail.com', 'Kalista');		 
	$mail->addAddress($correo, 'usuarios');
	// $mail->addAddress('paola.permz@gmail.com');
	
	$mail->isHTML(true);								 
	$mail->Subject = 'ARREGLO PDF';
    
	$html = '
    <html>
    <head>
        <style>
            /* Estilo para el encabezado */
            header {
                background-color: #C1719A; /* Color rosa para el encabezado */
                padding: 1px;
                text-align: center;
				border-radius: .5em;
            }
            /* Estilo para el título "KALISTA" en rojo */
            h1 {
                color: #8E0505;
            }
            /* Estilo para la tabla */
            table {
                width: 100%;
                border-collapse: separate;
                margin-top: 30px;
				color: #643843;
				background-color: #E8E8E8;
				border-radius: .5em;
            }
            th, td {
                border: 3px double;
                padding: 8px;
                text-align: left;
            }
            /* Estilo para las imágenes */
            img {
                max-width: 100px; /* Ajusta el tamaño de la imagen según sea necesario */
                max-height: 100px;
            }
			.arreglo-celda {
				color: #643843; /* Cambiado a #643843 */
				font-weight: bolder;
			}
        </style>
    </head>
    <body>
        <header>
            <h1>KALISTA</h1>
        </header>
			<table>
				<thead>
					<tr>
						<th>Descripción</th>
						<th>Precio</th>
						<th>Arreglo</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Arreglo floral 1</td>
						<td>$50.00</td>
						<td><img src="imagenes/ramo1.jpeg"></td>
					<!-- Agrega más filas según sea necesario -->
				</tbody>
			</table>
		</body>
    </html>';

	$dompdf->loadHtml($html);
	$dompdf->render();
	$content = $dompdf->output();
	$file_name = 'Arreglo.pdf';
	file_put_contents($file_name, $content);

	// if (file_exists($file_name) && is_readable($file_name)) {
	// 	$mail->addAttachment($file_name, 'prueba.pdf');
	// } else {
	// 	echo 'File not found or not readable.';
	// }
	$mail->addAttachment($file_name, 'Arreglo.pdf');
	$mail->Body = "Inventario Disponible";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	// $mail->addAttachment($file_name, 'Kalista.pdf', 'base64', 'application/pdf');
	// $mail->addAttachment($file_name, 'prueba.pdf');
	$mail->send();

	echo "<br>Mail has been sent successfully!";
    header('location:Producto.php');
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>