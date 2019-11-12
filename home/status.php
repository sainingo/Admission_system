<?php 
	session_start();
	if(isset($_SESSION['email']))
	{
    ?>
<html>
<?php include 'home-menu.php';?>
<?php include 'user-side-menu.php' ; ?>
<div class="col-md-9">
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg" style="background: green;">
      <h3 class="panel-title" style="color: white !important;">Application Status</h3>
    </div>
    <div class="panel-body">
      <p id="wait">Status Pending 
        <div id="wait">
        </div>
      </p>

      
    </div>
  </div>
</div>
<script src="./admin/js/main.js"></script>
</div>
<!-- To add same code before the last div -- >

</html>
<?php } else { ?>
<?php  						echo "<script language='javascript'>alert('You are not logged in');
			window.location.href='/Admission_system/';
			 </script>"; } ?>