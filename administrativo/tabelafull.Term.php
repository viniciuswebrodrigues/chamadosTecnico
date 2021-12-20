<!doctype html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap Lib -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/app-style.css" rel="stylesheet" />
  <!-- datatable lib -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

</head>
<style>
  /* Largura da barra de rolagem */
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Fundo da barra de rolagem */
  ::-webkit-scrollbar-track-piece {
    background-color: #EEE;
    border-left: 1px solid #CCC
  }

  /* Cor do indicador de rolagem */
  ::-webkit-scrollbar-thumb:vertical,
  ::-webkit-scrollbar-thumb:horizontal {
    background-color: #BAC0C4
  }

  /* Cor do indicador de rolagem - ao passar o mouse */
  ::-webkit-scrollbar-thumb:vertical:hover,
  ::-webkit-scrollbar-thumb:horizontal:hover {
    background-color: #717171
  }

  table {
    min-width: 100% !important;
    position: relative !important;
    background: url('../assets/images/bg-themes/1.png');
  }

  table tbody tr {
    background: url('../assets/images/bg-themes/17.png');
    color: white;
  }

  #background {
    background: url('../assets/images/bg-themes/1.png');
  }

.label-danger {
  text-transform: capitalize;
  font-size: 14px;
  border-radius: 3px;
  width: 100px;
  display: block;
  text-align: center;
  background-color: red;
}

.label-success {
  text-transform: capitalize;
  font-size: 14px;
  border-radius: 3px;
  width: 100px;
  display: block;
  text-align: center;
  background-color: #23d160;
}
</style>

<body>
    <div class="table-responsive">
      <table id="customer_data" class="table table-sm">
        <thead>
          <tr>
            <th>ID</th>
            <th>ide</th>
            <th>terminal</th>
            <th>modelo</th>
            <th>ultima_venda</th>
            <th>sonda</th>
			<th>Criado</th>
            <th>atendimento</th>
            <th>Detalhes</th>
          </tr>
        </thead>
      </table>
    </div>
  <br />
  <br />
</body>

</html>
<script type="text/javascript" language="javascript">
  $(document).ready(function() {

    $('#customer_data').DataTable({
      "processing": true,
      "serverSide": true,
            "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar atendimento:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                },
      "ajax": {
        url: "fetch.Term.php",
        type: "POST"
      },
      dom: 'lBfrtip',
      buttons: [
        'excel', 'csv'
      ],
      "lengthMenu": [
        [25, 50, -1],
        [25, 50, "All"]
      ],
      order: [
        [0, 'DESC']
      ],
      "aoColumnDefs": [{
        type: 'date-uk',
        aTargets: [0]
      }]
    });

  });
</script>