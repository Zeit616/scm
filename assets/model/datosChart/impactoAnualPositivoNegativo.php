<?php
require_once "../conexcionDataBase.php";
$currentYear = date('Y');
$stmt = conection::conectar()->prepare("SELECT FechaNoticia, Impacto FROM noticia WHERE YEAR(FechaNoticia) = :currentYear");
$stmt->bindParam(':currentYear', $currentYear);
$stmt->execute();

$monthlyData = array(); // Arreglo para almacenar los datos agrupados por mes

// Verificar si hay resultados y extraer los datos
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $fecha = new DateTime($row["FechaNoticia"]);
        $mes = $fecha->format('n'); // Obtener el número del mes sin ceros iniciales

        // Verificar el valor de "impacto" y aumentar la cuenta correspondiente para el mes actual
        if ($row["Impacto"] == "Positivo") {
            if (!isset($monthlyData[$mes])) {
                $monthlyData[$mes] = array(
                    'positivo' => 1,
                    'negativo' => 0
                );
            } else {
                $monthlyData[$mes]['positivo']++;
            }
        } else {
            if (!isset($monthlyData[$mes])) {
                $monthlyData[$mes] = array(
                    'positivo' => 0,
                    'negativo' => 1
                );
            } else {
                $monthlyData[$mes]['negativo']++;
            }
        }
    }
}

// Nombres de los meses en español
$meses = array(
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
    'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
);

// Preparar los datos para el gráfico de barras en Chart.js
$labels = array();
$positivo = array();
$negativo = array();

// Ordenar los meses en orden ascendente
ksort($monthlyData);

foreach ($monthlyData as $mes => $data) {
    $nombreMes = $meses[$mes - 1]; // Obtener el nombre del mes en español
    $labels[] = $nombreMes;
    $positivo[] = $data['positivo'];
    $negativo[] = $data['negativo'];
}

$data = array(
    'labels' => $labels,
    'positivo' => $positivo,
    'negativo' => $negativo
);

// Convertir el arreglo a formato JSON y enviarlo como respuesta
header('Content-Type: application/json');
echo json_encode($data);
?>
