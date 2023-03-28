<?php


//varible setting
 $Roll = $_REQUEST['roll_no']; 
 $pass = $_REQUEST['pass'];
 $S_name = $_REQUEST['student_name'];
 $S_grade = $_REQUEST['student_grade'];
 $S_marks = $_REQUEST['student_mark'];
 $Remark = $_REQUEST['remarks']; 
 


 $password = 'asfr125g@83';   // Default password


 // check password

 if ($pass == $password){ 

extract($_REQUEST);
$file = fopen('data/'.$Roll.'.csv',"a");   // Create and Append data in respective CSV files acc. to Roll no. inside "data" folder

fwrite($file, $Roll .",");
fwrite($file, $S_name .",");
fwrite($file, $S_grade .",");
fwrite($file, $S_marks .",");
fwrite($file, $Remark ."\n");
    
fclose($file);
   
echo"<script type='text/javascript'>alert('Submitted Successfully !');
window.history.go(-1); 
</script>";

}else{     
    echo"<script type='text/javascript'>alert('Incorrect password, try again !');  
    window.history.go(-1); 
    </script>";
    exit(); // stop saving process
}

?>