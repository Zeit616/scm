<div class="container-fluid">
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Control de impacto</h1>
                    </div>                
                </div>
            </div>
        </div>
    <!-- Fin content-header -->

    <!-- Contenido principal -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <!-- Tarjeta colapsable con Barchart de impacto anual Positivo/Negativo -->
                      <div class="col-12">
                        <div class="card card-success">
                          <div class="card-header">
                            <h3 class="card-title">Impacto anual de los medios</h3>            
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                              <div class="chart">
                                  <canvas id="ImpactoAnualPositivoNegativoBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                              </div>
                          </div>
                        </div>
                      </div>
                </div>               
            </div>
        </div>
    <!-- Fin contenido principal -->
</div>

  <!-- Scripts Necesarios -->            
      <!-- Script Recursos necesarios para los chart -->
          <script src="../../plugins/charts/Chart.min.js"></script>
      <!-- Script renderizado de Charts -->
          <script src="../../plugins/charts/renderChartsTableroPrincipal.js"></script>
  <!-- Fin Scripts Necesarios -->                       