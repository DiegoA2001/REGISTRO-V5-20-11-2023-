<?php
require('./fpdf.php');

class PDF extends FPDF
{
    // Variables de posición del encabezado
    private $headerPosition = 0;

    // Cabecera de página
    function Header()
    {
        if ($this->headerPosition == 0 || $this->GetY() <= $this->headerPosition) {
        //Agregar aquí cualquier contenido para la cabecera.
        $this->Image('https://www.standrews.cl/wp-content/uploads/2022/10/logo-st-andrews.png', 260, 7, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
        $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(30); // Mover a la derecha
        $this->SetTextColor(0, 0, 0); //color
        //Creación de celda o fila
        $this->Cell(200, 15, utf8_decode('ST. ANDREWS SMOKY DELICACIES S.A.'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
        $this->Ln(3); // Salto de línea
        $this->SetTextColor(103); //color

        /* UBICACION */
        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
        $this->Ln(5);

        /* TELEFONO */
        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
        $this->Ln(5);

        /* CORREO */
        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
        $this->Ln(5);

        /* SUCURSAL */
        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
        $this->Ln(10);

        /* TITULO DE LA TABLA */
        //color
        $this->SetTextColor(228, 100, 0);
        $this->Cell(90); // mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode("REGISTRO CONTROL DE PESO"), 0, 1, 'C', 0);
        $this->Ln(7);

        /* CAMPOS DE LA TABLA */
        //color
        $this->SetFillColor(228, 100, 0); //colorFondo
        $this->SetTextColor(255, 255, 255); //colorTexto
        $this->SetDrawColor(163, 163, 163); //colorBorde
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(16, 10, utf8_decode('FECHA'), 1, 0, 'C', 1);
        $this->Cell(20, 10, utf8_decode('CLIENTE'), 1, 0, 'C', 1);
        $this->Cell(20, 10, utf8_decode('MONITOR'), 1, 0, 'C', 1);
        $this->Cell(20, 10, utf8_decode('SUPERVISOR'), 1, 0, 'C', 1);
        $this->Cell(16, 10, utf8_decode('LOTE'), 1, 0, 'C', 1);
        $this->Cell(16, 10, utf8_decode('FICHA'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('FOLIO'), 1, 0, 'C', 1);
        $this->Cell(13, 10, utf8_decode('HORA'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 1'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 2'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 3'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 4'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 5'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 6'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 7'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 8'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 9'), 1, 0, 'C', 1);
        $this->Cell(12, 10, utf8_decode('PESO 10'), 1, 0, 'C', 1);
        $this->Cell(23, 10, utf8_decode('OBSERVACIONES'), 1, 1, 'C', 1);
   
    }
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); // Tipo de fuente, tamañoTexto
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); // Número de página

        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); // Tipo de fuente, tamañoTexto
        $hoy = date('d/m/Y');
        $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // Fecha
        $this->headerPosition = $this->GetY(); // Actualizar la posición del encabezado
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $searchTerm = trim($_POST['buscar']);

    // Establece la conexión con la base de datos
    $conex = mysqli_connect("localhost", "root", "", "formulario");
    if (!$conex) {
        die("Error al conectar: " . mysqli_connect_error());
    }
    // Realiza una consulta SQL para obtener los registros filtrados por fecha
    $consulta = "SELECT datos.fecha, clientes.nombre_cliente, monitores.nombre_monitor, supervisores.nombre_supervisor, datos.lote, datos.ficha, datos.folio, datos.hora, datos.peso1, datos.peso2, datos.peso3, datos.peso4, datos.peso5, datos.peso6, datos.peso7, datos.peso8, datos.peso9, datos.peso10, datos.observaciones 
    FROM datos 
    INNER JOIN clientes ON datos.cliente = clientes.customer_id 
    LEFT JOIN monitores ON datos.monitor = monitores.monitor_id
    LEFT JOIN supervisores ON datos.supervisor = supervisores.supervisor_id
    WHERE datos.fecha LIKE '%$searchTerm%' OR datos.lote LIKE '%$searchTerm%' OR clientes.nombre_cliente LIKE '%$searchTerm%' OR datos.ficha LIKE '%$searchTerm%'";
    $resultado = mysqli_query($conex, $consulta);

    // Inicializa el PDF
    $pdf = new PDF();
    $pdf->AddPage("landscape");
    $pdf->AliasNbPages();
    $pdf->AddDataFromDB(mysqli_fetch_all($resultado, MYSQLI_ASSOC));
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetDrawColor(163, 163, 163);

    // Agrega los datos filtrados al PDF
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $pdf->Cell(16, 10, utf8_decode($fila['fecha']), 1, 0, 'C');
        $pdf->Cell(20, 10, utf8_decode($fila['nombre_cliente']), 1, 0, 'C');
        $pdf->Cell(20, 10, utf8_decode($fila['nombre_monitor']), 1, 0, 'C');
        $pdf->Cell(20, 10, utf8_decode($fila['nombre_supervisor']), 1, 0, 'C');
        $pdf->Cell(16, 10, utf8_decode($fila['lote']), 1, 0, 'C');
        $pdf->Cell(16, 10, utf8_decode($fila['ficha']), 1, 0, 'C');
        $pdf->Cell(18, 10, utf8_decode($fila['folio']), 1, 0, 'C');
        $pdf->Cell(13, 10, utf8_decode($fila['hora']), 1, 0, 'C');
        for ($i = 1; $i <= 10; $i++) {
            $pdf->Cell(12, 10, utf8_decode($fila['peso' . $i]), 1, 0, 'C');
        }
        $pdf->Cell(23, 10, utf8_decode($fila['observaciones']), 1, 0, 'C');

        $pdf->Ln();
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conex);

    // Genera y muestra el PDF en el navegador
    $pdf->Output('Resultados_Busqueda.pdf', 'I');
} else {
    // Si no se realiza una búsqueda, se genera el PDF con todos los registros
    $pdf = new PDF();
    $pdf->AddPage("landscape");
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetDrawColor(163, 163, 163);

    // Establece la conexión con la base de datos
    $conex = mysqli_connect("localhost", "root", "", "formulario");
    if (!$conex) {
        die("Error al conectar: " . mysqli_connect_error());
    }

    // Realiza una consulta SQL para obtener todos los registros
    $consulta = "SELECT datos.*, clientes.nombre_cliente, monitores.nombre_monitor, supervisores.nombre_supervisor 
    FROM datos
    LEFT JOIN clientes ON datos.cliente = clientes.customer_id
    LEFT JOIN monitores ON datos.monitor = monitores.monitor_id
    LEFT JOIN supervisores ON datos.supervisor = supervisores.supervisor_id
    ORDER BY datos.folio";
    $resultado = mysqli_query($conex, $consulta);

    // Agrega todos los datos al PDF
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $pdf->Cell(16, 10, utf8_decode($fila['fecha']), 1, 0, 'C');
        $pdf->Cell(20, 10, utf8_decode($fila['nombre_cliente']), 1, 0, 'C');
        $pdf->Cell(20, 10, utf8_decode($fila['nombre_monitor']), 1, 0, 'C');
        $pdf->Cell(20, 10, utf8_decode($fila['nombre_supervisor']), 1, 0, 'C');
        $pdf->Cell(16, 10, utf8_decode($fila['lote']), 1, 0, 'C');
        $pdf->Cell(16, 10, utf8_decode($fila['ficha']), 1, 0, 'C');
        $pdf->Cell(18, 10, utf8_decode($fila['folio']), 1, 0, 'C');
        $pdf->Cell(13, 10, utf8_decode($fila['hora']), 1, 0, 'C');
        for ($i = 1; $i <= 10; $i++) {
            $pdf->Cell(12, 10, utf8_decode($fila['peso' . $i]), 1, 0, 'C');
        }
        $pdf->Cell(23, 10, utf8_decode($fila['observaciones']), 1, 0, 'C');

        $pdf->Ln();
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conex);

    // Genera y muestra el PDF en el navegador
    $pdf->Output('Todos_Los_Registros.pdf', 'I');
}
?>