<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if (isset($_SESSION['email'])) {
    include 'adminLoginHandler.php';
    
    $id = $_GET['id'];
    $result = $conn->prepare("DELETE FROM courses WHERE ID = ?");
    $result->bindParam(1, $id);
    $result->execute();
    echo "<script language='javascript'>alert('Course Deleted Successfuly');
                      window.location.href='/Admission_system/admin/addCourse.php';
                       </script>";
    
    
} else {
    echo "<script language='javascript'>alert('Login to continue');
            window.location.href='/Admission_system/admin';
             </script>";
}
?>
