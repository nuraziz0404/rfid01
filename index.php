<!DOCTYPE html>
<html>
<head>
  <style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2}

  th {
    background-color: #4CAF50;
    color: white;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

  <h2>RFID LOGS</h2>

  <table>
    <thead>
      <tr>
        <th>Log Id</th>
        <th>Name</th>
        <th>Card Id</th>
        <th>Log Date</th>
        <th>Delete</th>
      </tr>
    <thead>

    <tbody id="logs">
    </tbody>
  </table>

  <script type="text/javascript">

    $(document).ready(function(){
      function showData()
      { 
        $.ajax({

          url: 'log.php',
          type: 'POST',
          data: {action : 'showLogs'},
          dataType: 'html',
          success: function(result)
          {
            $('#logs').html(result);
          },
          error: function()
          {
            alert("Failed to fetch logs!");
          }
        })
      }

      //Fetch freedbtech_rfid logs in database every 2.5 seconds
      setInterval(function(){ showData(); }, 500);
    });



  </script>
</body>
</html>
