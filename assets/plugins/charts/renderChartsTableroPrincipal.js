$(function () {
  var barChartCanvas = $('#ImpactoAnualPositivoNegativoBarChart').get(0).getContext('2d');

  // Realizar solicitud AJAX al archivo PHP
  $.ajax({
    url: '../../model/datosChart/impactoAnualPositivoNegativo.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      // Los datos se han recuperado exitosamente
      var barChartData = {
        labels: data.labels,
        datasets: [
          {
            label: 'Positivo',
            backgroundColor: 'rgba(58, 255, 0, 0.8)',
            borderColor: 'rgba(58, 255, 0, 0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(58, 255, 0, 0.8)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(58, 255, 0, 0.8)',
            data: data.positivo
          },
          {
            label: 'Negativo',
            backgroundColor: 'rgba(255, 0, 0, 0.8)',
            borderColor: 'rgba(255, 0, 0, 0.8)',
            pointRadius: false,
            pointColor: 'rgba(255, 0, 0, 0.8)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(255, 0, 0, 0.8)',
            data: data.negativo
          },
          {
            label: 'Neutro',
            backgroundColor: 'rgba(128, 128, 128, 0.8)', // Cambiar a gris (RGB: 128, 128, 128)
            borderColor: 'rgba(128, 128, 128, 0.8)', // Cambiar a gris (RGB: 128, 128, 128)
            pointRadius: false,
            pointColor: 'rgba(128, 128, 128, 0.8)', // Cambiar a gris (RGB: 128, 128, 128)
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(128, 128, 128, 0.8)', // Cambiar a gris (RGB: 128, 128, 128)
            data: data.neutro
          },
        ]
      };

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      };

      // Mostrar solo los meses que tienen datos
      barChartOptions.scales = {
        x: {
          stacked: true,
          ticks: {
            autoSkip: true,
            maxTicksLimit: 12 // Mostrar como máximo 12 ticks en el eje X
          }
        }
      };

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      });
    },
    error: function (xhr, status, error) {
      // Ocurrió un error al recuperar los datos
      console.error(error);
    }
  });
});
