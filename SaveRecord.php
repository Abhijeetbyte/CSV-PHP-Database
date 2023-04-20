<?php


// Extract POST variables

$idNo = $_POST['id_no']; // served as primery key
$password = $_POST['pass'];
$studentName = $_POST['student_name'];
$studentGrade = $_POST['student_grade'];
$studentMark = $_POST['student_mark'];
$remarks = $_POST['remarks'];


// Setting Variables

$dir = 'data'; // default folder name, files (.csv) store inside it
$filename = $dir . '/' . $idNo . '.csv'; // file naming acc. to Roll no.


// Validate password
if ($password !== 'admin123') { //  default folder name
    echo "<script>alert('Incorrect Password, try again!');history.go(-1);</script>";

    exit();  // Terminate the current script
}


// Create folder if it does not exist
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}


// Open file in append mode (also creates , if file does not exists)

$file = fopen($filename, 'a+');

// Acquire exclusive lock on file to prevent concurrent access
if (flock($file, LOCK_EX)) {

    fputcsv($file, [$idNo, $studentName, $studentGrade, $studentMark, $remarks]);

    flock($file, LOCK_UN);


    echo "<script>alert('Submitted successfully!');history.go(-1);</script>";
} else {
    echo "<script>alert('Unsuccessful ! Try after few minutes');history.go(-1);</script>";
}

fclose($file);
