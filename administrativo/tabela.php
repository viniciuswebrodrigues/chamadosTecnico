<!doctype html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap Lib -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- datatable lib -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" />


</head>
<style>

body {
  background-color: rgba(15, 80, 127);
}
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
  background-color: rgba(15, 80, 127) !important;
}

table tbody tr{
  background-color: rgba(15, 80, 127) !important;
  color: white;
}

#background {
background: url('../assets/images/bg-themes/1.png');
}
</style>

<body>
  <div id="background">

    <table id="course_table" class="table">
      <thead>
        <tr>
          <th bgcolor="white" width="5%">ID</th>
          <th bgcolor="white" width="5%">ide</th>
          <th bgcolor="white" width="10%">terminal</th>
          <th bgcolor="white" width="10%">modelo</th>
          <th bgcolor="white" width="10%">ultima_venda</th>
          <th bgcolor="white" width="10%">sonda</th>
          <th bgcolor="white" width="10%">status</th>
          <th bgcolor="white" scope="col" width="5%">Edit</th>
          <th bgcolor="white" scope="col" width="5%">Delete</th>
        </tr>
      </thead>
    </table>
</body>

</html>


<script type="text/javascript" language="javascript">
  $(document).ready(function () {
    $('#add_button').click(function () {
      $('#course_form')[0].reset();
      $('.modal-title').text("Add Course Details");
      $('#action').val("Add");
      $('#operation').val("Add");
    });

    var dataTable = $('#course_table').DataTable({
      "paging": true,
      "processing": true,
      "serverSide": true,
      "order": [],
      "info": true,
      "ajax": {
        url: "fetch.php",
        type: "POST"
      },
      "columnDefs": [
        {
          "targets": [0, 3, 4],
          "orderable": false,
        },
      ],
    });


    $(document).on('click', '.update', function () {
      var course_id = $(this).attr("id");
      $.ajax({
        url: "fetch_single.php",
        method: "POST",
        data: { course_id: course_id },
        dataType: "json",
        success: function (data) {
          $('#userModal').modal('show');
          $('#id').val(data.id);
          $('#course').val(data.course);
          $('#students').val(data.students);
          $('.modal-title').text("Edit Course Details");
          $('#course_id').val(course_id);
          $('#action').val("Save");
          $('#operation').val("Edit");
        }
      })
    });
    var timeOutId = 0;
    var ajaxFn = function () {
      $.ajax({
        url: 'fetch.php/' + new Date().getTime(),
        success: function (response) {
          if (response == 'True') {
            $('.DataDiv').
              load('GetFreshData/' + new Date().getTime(), {
                "Id": $("#RowID").val()
              });
            clearTimeout(timeOutId);
          } else {
            timeOutId = setTimeout(ajaxFn, 10000);
            console.log("call");
          }
        }
      });
    }
    ajaxFn();
    //OR use BELOW line to wait 10 secs before first call
    timeOutId = setTimeout(ajaxFn, 5000);


  });
</script>