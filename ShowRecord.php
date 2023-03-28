<?php

//varaible setting

$Roll = $_REQUEST['roll_no'] ?? '01'; // fetch roll no value or with a default variable

$filename = 'data/'.$Roll.'.csv';  // inside data folder

$records = [];  // empty array to store all records



// Check data file

if(file_exists($filename)) {

} else {

    echo"<script type='text/javascript'>alert('Record not found, Try again !');
    window.history.go(-1); 
    </script>";
    die();  // error handler
}


if (($handle = fopen($filename, "r")) !== FALSE) {  // succesfully open & read file

    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {   // extract rows data

      $records[] = $row; // append in a array
    }

    fclose($handle);

  } else {

    echo"<script type='text/javascript'>alert('Error encountered, while opening or reading file !');
    </script>";
    die();  // error handler
  }

  
?>



</html>

<head>
    
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel=" stylesheet" type="text/css" href="style.css" />
  <title>Records</title>

<style>

table {
    border-collapse: collapse;
    margin: 25px 0;
    border-radius: 5px 5px 0 0;
    overflow : hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
table, th, td {
  padding: 10px 5px ;
  text-align: left;
}
table thead tr {
    background-color: #33a0e9;
    color: #fff;
    text-align: left;
}
table tbody tr {
    border-bottom: 1px solid #dddddd;
}
table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}
table tbody tr:last-of-type {
    border-bottom: 2px solid  #33a0e9;
}

</style>

</head>

<body>

<center>
 
<h1> Data </h1>

    <table style="width:80%">
    
        <thead>
            <th>Roll</th>
            <th>Name</th>
            <th>Grade</th>
            <th>Marks</th>
            <th>Remark</th>
        
        </thead>

        
        <tbody>
        <?php foreach($records as $rec){ ?>
            <tr>
                <td><?=$rec[0]?></td>
                <td><?=$rec[1]?></td>
                <td><?=$rec[2]?></td>
                <td><?=$rec[3]?></td>
                <td><?=$rec[4]?></td>

                </tr>
            <?php  } ?>   
         </tbody>

    </table>

    </center>

    <br/>
    <br/>
    <br/>
    <br/>
 

    <div class="footer">
    <p>
    Copyright &copy; 2023
    </p>
    </div>
    
    </body>
    </html>
    
   