<?php
session_start();
$sid=0;
if(isset($_SESSION['email']))
{
	$id=$_GET['id'];
	include 'variables.php';
	$mysqli = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);

	$query = "SELECT * from education_information WHERE id = $id"; 
	$result = $mysqli->query($query) or die($mysqli->error);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			foreach($row as $val) {
				$details[] = $val;
			}
			$sid=$details[0];
		}   
	}
	if($id==$sid){
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Jquery -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
		<title>Basic Profile</title>
		<body>
			<div class="container">
				<h1 class="well" style="text-align: center;">Educational Details</h1>
				<div class="col-lg-12 well">
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>High School Name</label>
									<input type="text" class="form-control" value="<?php echo $details[1]; ?>" readonly>
								</div>

								<div class="col-sm-6 form-group">
									<label>High School Grade</label>
									<input type="text" class="form-control" value="<?php echo $details[2]; ?>" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Other School</label>
									<input type="text" class="form-control" value="<?php echo $details[3]; ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label>Qualification</label>
								<textarea name="address" rows="3" class="form-control" readonly> <?php echo $details[4]; ?> </textarea>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Index NO</label>
									<input type="text" class="form-control" value="<?php echo $details[5]; ?> " readonly>
								</div>
								<div class="col-sm-3 form-group">
									<label>Mathematics</label>
									<input type="text" size="5" class="form-control" value="<?php echo $details[6]; ?> " readonly>
								</div>
								<div class="col-sm-3 form-group">
									<label>English</label>
									<input type="text" size="5" class="form-control" value="<?php echo $details[7]; ?> " readonly>
								</div>
								<div class="col-sm-3 form-group">
									<label>Kiswahili</label>
									<input type="text" size="5" class="form-control" value="<?php echo $details[8]; ?> " readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Physics</label>
									<input type="text" size="5" class="form-control" value="<?php echo $details[9]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>Chemistry</label>
									<input type="text" size="5" class="form-control" value="<?php echo $details[10]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>Business</label>
									<input type="text" size="5" name="reg_date" class="form-control" value="<?php echo $details[11]; ?> " readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Agriculture</label>
									<input type="text" size="5" class="form-control" value="<?php echo $details[12]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>Computer Science</label>
									<input type="text" size="5" class="form-control" value="<?php echo $details[13]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>Biology</label>
									<input type="text" size="5" name="reg_date" class="form-control" value="<?php echo $details[14]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>CRE</label>
									<input type="text" size="5" name="reg_date" class="form-control" value="<?php echo $details[15]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>History</label>
									<input type="text" size="5" name="reg_date" class="form-control" value="<?php echo $details[16]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>Geography</label>
									<input type="text" size="5" name="reg_date" class="form-control" value="<?php echo $details[17]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>French</label>
									<input type="text" size="5" name="reg_date" class="form-control" value="<?php echo $details[18]; ?> " readonly>
								</div>
								<div class="col-sm-4 form-group">
									<label>Home Science</label>
									<input type="text" size="5" name="reg_date" class="form-control" value="<?php echo $details[18]; ?> " readonly>
								</div>
							</div>
						</div>
					</div>
					<button type="submit">Modify</button>
				</div>
				
			</div>
<!-- Education Details -->			
<!--			<div class="container">
				<h1 class="well" style="text-align: center;">Educational Detail</h1>
				<div class="col-lg-12 well">
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>SSC</label>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>-->

		</body>
		</html>
		<?php
	}
	else{
		?>
		<?php 
		echo '<title> Error </title>
		<div class="container" style="margin:150px;">
		<h1 class="well" style="text-align: center;color: red !important;">Error : Invalid Student ID</h1>
		<h3 class="well" style="text-align: center;"><a href="view.php?id=1" style="color: #000080 !important;">Click here to return ID 1</a></h3>';
	}
	?>    
	<?php
}
else{
	?>
	<?php	
	echo "<script language='javascript'>alert('Login to continue');
	window.location.href='/Admission_system/admin';
	</script>";

}
?>