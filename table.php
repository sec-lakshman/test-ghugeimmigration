<?php include 'connect.php';
// if(!isset($_SESSION['uname'])){
//     header('Location: admin.php');
// }

// // logout
// if(isset($_POST['but_logout'])){
//     session_destroy();
//     header('Location: index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>






    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>    
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>






    <style type="text/css">
      select:not([multiple]) {
    -webkit-appearance: none;
    -moz-appearance: none;
    background-position: right 50%;
    background-repeat: no-repeat;
    
    padding: .5em;
    padding-right: 1.5em
}

#mySelect {
    border-radius: 0
}
#dropdown {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.button {
  border: none;
  color: white;
  padding: 8px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 8px 2px;
  cursor: pointer;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  padding-top: 0px;
  padding-bottom: 0px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 3px;
  padding-bottom: 3px;
  text-align: left;
  background-color: #686e68;
  color: white;
}
    </style>
     <div class="header">
     
   
<div class="container">
<div class="row">              

<!-- <nav id='cssmenu' style="float:right;margin-top:-20px;">
<a href="../adminPanel.html"><button style="background-color: #313133;" class="button" type="" name="">Admin Page</button></a>

</nav> -->
</div>
</div>
</div>
  </head>
  <body>

  <div class="container text-center">
    <a href="admin.php"><button style="background-color: #313133;" class="button" type="" name="">Logout</button></a>
 <!--  <form method='post' action="admin.php">
            <input type="submit" value="Logout" name="but_logout">
        </form> -->
<table id="customers" data-toggle="table" 
       data-classes="table table-hover table-condensed"
       data-striped="true"
       data-sort-name="Quality"
       data-sort-order="asce"
       data-pagination="true"
       data-search= true
       >
<thead>
    <th class="col-xs-1" data-field="Sl.no"  data-sortable="true">Sl.no</th>
    <th class="col-xs-1" data-field="Name" data-sortable="true">Name</th>
    <th  class="col-xs-1" data-field="Date" data-sortable="true">Date</th>
    <th  class="col-xs-1" data-field="Email" data-sortable="true">Email</th>
    <th  class="col-xs-1" data-field="Categories" data-sortable="true">Categories</th>
    <th class="col-xs-1" data-field="Message" data-sortable="true">Message</th>
    <th class="col-xs-1" data-field="Type" data-sortable="true">Type</th>

</thead>
<tbody>
  <?php 
$counter = 0;
         
//   $resultz = "SELECT * FROM feedback";
   $resultz = "SELECT * FROM Appointment";
  $result = $db->query($resultz);
  

      if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
          ?>
    <tr>
      <td><?php echo ++$counter; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td style="width:120px"><?php echo $row['date']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['categories']; ?></td>
      <td><?php echo $row['message']; ?></td>
      <td><?php echo $row['type']; ?></td>
    </tr>
  <?php }
    }

   ?>
</tbody>
</table>
</div>

<script>
function queryParams() {
    return {
        type: 'owner',
        sort: 'updated',
        direction: 'desc',
        per_page: 100,
        page: 1
    };
}
</script>

  </body>
</html>
