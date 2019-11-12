<?php
    session_start();
    $a="";
    $msg="";
    if(isset($_SESSION['email']))
    {        
        
        //function this
        $email = $_SESSION['email'];
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

        if(isset($_POST['submitEducationDetails_BE'])){
            //start hardcoding in variables
            //ssc
            $highSchool = $_POST['highSchool'];
            $highGrade = $_POST['highGrade'];
            $otherSchool = $_POST['otherSchool'];
            $quali = $_POST['qual'];
            $indexNo = $_POST['indexNo'];
            $math = $_POST['math'];
            $eng = $_POST['eng'];
            $kisw = $_POST['kisw'];
            $phyc = $_POST['phyc'];
            $chem = $_POST['chem'];
            $bio = $_POST['bio'];
            $geo = $_POST['geo'];
            $hist = $_POST['hist'];
            $cre = $_POST['cre'];
            $french = $_POST['french'];
            $comp_sci = $_POST['comp_sci'];
            $home_sci = $_POST['home_sci'];
            $agri = $_POST['agri'];
            $biz = $_POST['biz'];
            /* End Hardcoding */
            //queries_setting user ID
            $id = $details[0];
            //Connection
            $conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName;", $databaseUsername, $databasePassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Query to check education information
            $eQuery = $conn->prepare( "SELECT `ID` FROM `education_information` WHERE `ID` = ?" );			
			$eQuery->bindValue(1, $details[0]);
            $eQuery->execute();
            if($eQuery->rowCount() > 0 )
			{	
                $msg = "We Already Have Your Details";
                $a = "readonly";
			}
			else{
			    try{ //Inserting Details
                    $insertEducationQry_be = "INSERT INTO education_information (ID,high_school,high_school_Grade,other_school,qualification,index_no,math,english,kiswahili,physics,chemistry,business,agri,comp_sci,biology,cre,history,geo,french,home_sci,isActive) 
                    
                    VALUES ('$id','$highSchool','$highGrade','$otherSchool','$quali','$indexNo','$math','$eng','$kisw','$phyc','$chem','$biz','$agri','$comp_sci','$bio','$cre','$hist','$geo','$french','$home_sci',1)";
                if ($conn->query($insertEducationQry_be)) //Inserting (Applying) BE
                {
                    //$insertQuery = "INSERT INTO selected_courses values('$id','coursename',1)";
                   // if ($conn->query($insertQuery)){
                        $msg = "<p style='text-align:center; color:green;'>Submited successful, proceed to apply the course </p>";
                   // }
                    //else{
                    //$msg = "<p style='text-align:center; color:red;'>An Error Occured Contact SysAdmin</p>";
                    //}
                }
                else
                {
                            $msg = "An Error Occured Contact SysAdmin";
                }
                    }
                    catch(PDOException $e){
                        echo $e;
                    }
            }
        }
     ?>

    <?php include 'home-menu.php'; ?>
    <?php include 'user-side-menu.php'; ?>
    <script>
        function sum() {
            var w = document.getElementById('phybe').value || 0;
            var x = document.getElementById('chembe').value || 0;
            var y = document.getElementById('matbe').value || 0;

            var z = parseInt(w) + parseInt(x) + parseInt(y);

            document.getElementById('totbe').value = z;
        };

        function handleChange(input) {
            if (input.value < 0) input.value = 0;
            if (input.value > 100) input.value = null;
        };

        $(document).ready(function() {
            $('select').on('change', function(event) {
                var prevValue = $(this).data('previous');
                $('select').not(this).find('option[value="' + prevValue + '"]').show();
                var value = $(this).val();
                $(this).data('previous', value);
                $('select').not(this).find('option[value="' + value + '"]').hide();
            });
        });
    </script>
    <!-- Educational Details -->
    <div class="container">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title"> <b>Educational Information</b> </h3>
                </div>
                <div class="panel-body">
                <p style='text-align:center; color:green;'>If not available indicate <strong>N/A</strong> </p>
                    <div class="col-lg-12">
                        <div class="row">
                     <form action="educational_details_be.php" method="post">
                            <div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>High School Name</label>
								<input type="text" name="highSchool" placeholder="Enter Your High School Name here.." class="form-control" required <?php echo $a?>>
							</div>
							<div class="col-sm-6 form-group">
								<label>High School Grade</label>
								<input type="text" name="highGrade" placeholder="Enter High school Grade here.." class="form-control" required <?php echo $a?>>
							</div>
						</div>
                        <div class="row">
                        <div class="col-sm-6 form-group">
								<label>Other School</label>
								<input type="text" name="otherSchool" placeholder="Enter Your other school here.." class="form-control" required <?php echo $a?>>
							</div>
						<div class="col-sm-6 form-group">
								<label>Qualification</label>
								<input type="text" name="qual" placeholder="Enter Your Qualification here.." class="form-control" required <?php echo $a?>>
							</div>

                        <div>
						
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Index Number</label>
								<input type="text" placeholder="Enter Index Number Here.." name="indexNo" class="form-control" required <?php echo $a?>>
							</div>
						 </div>
                         <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title"> <b>Subjects</b> </h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <p style="color:#BD0006;"> Grade per subject </p>
                            <div class="row">

                                <div class="col-sm-3 form-group">
                                    <label> Mathematics </label>
                                    <input type="text" name="math" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                 </div>

                                <div class="col-sm-3 form-group">
                                    <label> English</label>
                                    <input type="text" name="eng" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                       
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label> Kiswahili</label>
                                    <input type="text" name="kisw" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label> Physics</label>
                                    <input type="text" name="phyc" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                      
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> Chemistry</label>
                                    <input type="text" name="chem" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Business</label>
                                    <input type="text" name="biz" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> Agriculture </label>
                                    <input type="text" name="agri" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                       
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> Computer Science </label>
                                    <input type="text" name="comp_sci" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                       
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label> Biology </label>
                                    <input type="text" name="bio" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> CRE </label>
                                    <input type="text" name="cre" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> History</label>
                                    <input type="text" name="hist" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> Geography</label>
                                    <input type="text" name="geo" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                      
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> French</label>
                                    <input type="text" name="french" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                       
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> Home Science</label>
                                    <input type="text" name="home_sci" size="5" class="form-control" style="width:auto;" required <?php echo $a?>> 

                                </div>

                            </div>
                        </div>
                    </div><br><br>
						<input type="submit" style="color:#BD0006;" name="submitEducationDetails_BE" class="form-control btn btn-info">
                            <?php echo $msg;?>
					
					</div>
            </form>
            <?php
        }
        else
    {
        ?>
                <?php
			echo "<script language='javascript'>alert('You are not logged in');
			window.location.href='/Admission/';
			 </script>";
    }
    ?>