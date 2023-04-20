<?php

//varaible setting

$idNo = $_POST['id_no']; // fetch id value


// Setting Variables

$dir = 'data'; // default folder name, files (.csv) store inside it
$filename = $dir . '/' . $idNo . '.csv'; // file naming acc. to ID no.
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


  if (flock($handle, LOCK_SH)) { // shared lock the file while reading

    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {   // extract rows data
      $records[] = $row; // append in a array
    }

    flock($handle, LOCK_UN); // unlock the file after reading

    } else {
        echo "<script type='text/javascript'>alert('Error encountered while getting shared lock on file !');
        </script>";
        die(); // error handler
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"" />
  <link rel=" stylesheet" type="text/css" href="style.css" />
  <title>Records</title>



</head>

<body>

<center>
 
<h1> Data </h1>

    <table>
    
        <thead>
            <th>ID</th>
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
    
   
