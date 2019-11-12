<?php
    session_start();
    $a="";
    $msg="";
    if(isset($_SESSION['email']))
	{

        //function this
        include 'variables.php';
        $mysqli = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
        //
        $query = "SELECT * FROM student_data WHERE email = '{$_SESSION['email']}'"; 
        $result = $mysqli->query($query) or die($mysqli->error);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                foreach($row as $val) {
                    $details[] = $val;
                }
            }   
        }

        if(isset($_POST['submitBioData'])){
            // SSC
            $cTry = $_POST['country'];
            $cTy = $_POST['county'];
            $dSt = $_POST['district'];
            $iDbth = $_POST['idbirth'];
            $nOk = $_POST['nextofkin'];
            $rL =$_POST['rlshipkin'];
            $nKn = $_POST['nkinno'];
           
            //queries
            $id = $details[0];
            $conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName;", $databaseUsername, $databasePassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $eQuery = $conn->prepare( "SELECT `ID` FROM `bio_data` WHERE `ID` = ?" );			
			$eQuery->bindValue( 1, $details[0]);
            $eQuery->execute();
            if($eQuery->rowCount() > 0 )
			{	
                $msg = "We Already Have Your Details";
                $a = "readonly";

			}
			else{
			try{
            $insertEducationQry = "INSERT INTO 
                                   bio_data 
                                        VALUES                 
                                        ('$id',
                                         '$cTry','$cTy','$dSt','$iDbth','$nOk',
                                         '$rL','$nKn',
                                         1)";
                if ($conn->query($insertEducationQry))
                {
                            $msg = "Data Collected Successful. Proceed to Educational details";
                }
                else
                {
                            $msg = "An Error Occured Contact SysAdmin";
                }
                    }
                    catch(PDOException $e){
                        echo $e;
                    }

            }}
     ?>

<?php include 'home-menu.php'; ?>
    <?php include 'user-side-menu.php'; ?>
              <!-- Educational Details -->
        <div class="container">
            <div class="col-lg-9">
              <div class="panel panel-default">
                    <div class="panel-heading main-color-bg"> <h3 class="panel-title"> <b>Bio Data</b> </h3> </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="row">
                 <form action="bio_data.php" method="post">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Country</label>
								<input type="text" name="country" placeholder="Enter County here.." class="form-control" required <?php echo $a?>>
							</div>
							<div class="col-sm-6 form-group">
								<label>County</label>
								<input type="text" name="county" placeholder="Enter Country here.." class="form-control" required <?php echo $a?>>
							</div>
						</div>
                        <div class="row">
                        <div class="col-sm-6 form-group">
								<label>District</label>
								<input type="text" name="district" placeholder="Enter Your District here.." class="form-control" required <?php echo $a?>>
							</div>
						<div class="col-sm-6 form-group">
								<label>ID or Birth Certificate No</label>
								<input type="text" name="idbirth" placeholder="Enter Your Id/Birth Certificate here.." class="form-control" required <?php echo $a?>>
							</div>

                        <div>
						
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Next Of Kin</label>
								<input type="text" placeholder="Enter Next of Kin here..." name="nextofkin" class="form-control" required <?php echo $a?>>
							</div>
							<div class="col-sm-6 form-group">
								<label>Relationship of Kin</label>
								<input type="text" name="rlshipkin" placeholder="Relationship to next of kin" class="form-control" required <?php echo $a?>>
							</div>
							<div class="col-sm-6 form-group">
								<label>Next of Kin contact</label>
								<input type="text" name="nkinno" placeholder="Contacts of Next of Kin" class="form-control" required <?php echo $a?>>
							</div>
							
                        </div>
						
                        <input class="btn btn-info" type="submit" name="submitBioData" value="Submit">
                            <?php echo $msg;?>
					
					</div>
				</form>
                  
                    </div>
            </div>        
<?php } else { ?>
<?php 			echo "<script language='javascript'>alert('You are not logged in');
			window.location.href='/Admission/';
			 </script>"; } ?>