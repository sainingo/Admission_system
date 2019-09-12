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
            $sscboardbe = $_POST['sscboardbe'];
            $sscyearpassbe = $_POST['sscyearpassbe'];
            $sscperbe = $_POST['sscperbe'];
            $sscgradebe = $_POST['sscgradebe'];
            //hsc
            $hscboardbe = $_POST['hscboardbe'];
            $hscyearpassbe = $_POST['hscyearpassbe'];
            $hscpcm = $_POST['hscpcm'];            
            $hscperbe = $_POST['hscperbe'];
            $hscgradebe = $_POST['hscgradebe'];
            //basic
            $rollno = $_POST['rollnobe'];
            $phybe = $_POST['phybe'];
            $chembe = $_POST['chembe'];
            $matbe = $_POST['matbe'];
            $totbe = $_POST['totbe'];
            //acpc
            $rankbe = $_POST['rankbe'];
            $c1be = $_POST['c1be'];
            $c2be = $_POST['c2be'];
            $acpcregbe = $_POST['acpcregbe'];
            $acpcmeritbe = $_POST['acpcmeritbe'];
            $p1 = $_POST['p1'];
            $p2 = $_POST['p2'];
            $p3 = $_POST['p3'];
            $p4 = $_POST['p4'];
            /* End Hardcoding */
            //queries_setting user ID
            $id = $details[0];
            //Connection
            $conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName;", $databaseUsername, $databasePassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Query to check education information
            $eQuery = $conn->prepare( "SELECT `ID` FROM `education_information_be` WHERE `ID` = ?" );			
			$eQuery->bindValue(1, $details[0]);
            $eQuery->execute();
            if($eQuery->rowCount() > 0 )
			{	
                $msg = "We Already Have Your Details";
                $a = "readonly";
			}
			else{
			    try{ //Inserting Details
                    $insertEducationQry_be = "INSERT INTO education_information_be (ID,ssc_school,ssc_year,ssc_percentage,ssc_class,hsc_school,hsc_year,hsc_pcm,hsc_percentage,hsc_class,roll_no,physics,chemistry,maths,total,jee_main_rank,contact_01,contact_02,acpc_no,acpc_merit,p1,p2,p3,p4,isAvailable) 
                    
                    VALUES ('$id','$sscboardbe','$sscyearpassbe','$sscperbe','$sscgradebe','$hscboardbe','$hscyearpassbe','$hscpcm','$hscperbe','$hscgradebe','$rollno','$phybe','$chembe','$matbe','$totbe','$rankbe','$c1be','$c2be','$acpcregbe','$acpcmeritbe','$p1','$p2','$p3','$p4',1)";
                if ($conn->query($insertEducationQry_be)) //Inserting (Applying) BE
                {
                    $insertQuery = "INSERT INTO selected_courses values(NULL,'$id','B.E',1)";
                    if ($conn->query($insertQuery)){
                        $msg = "<p style='text-align:center; color:green;'>Application Successful </p>";
                    }
                    else{
                    $msg = "<p style='text-align:center; color:red;'>An Error Occured Contact SysAdmin</p>";
                    }
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
                    <div class="col-lg-12">
                        <div class="row">
                     <form action="educational_details_be.php" method="post">
                            <div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>High School Name</label>
								<input type="text" name="country" placeholder="Enter Your High School Name here.." class="form-control" required <?php echo $a?>>
							</div>
							<div class="col-sm-6 form-group">
								<label>High School Grade</label>
								<input type="text" name="county" placeholder="Enter High school Grade here.." class="form-control" required <?php echo $a?>>
							</div>
						</div>
                        <div class="row">
                        <div class="col-sm-6 form-group">
								<label>Other School</label>
								<input type="text" name="district" placeholder="Enter Your other school here.." class="form-control" required <?php echo $a?>>
							</div>
						<div class="col-sm-6 form-group">
								<label>Qualification</label>
								<input type="text" name="idbirth" placeholder="Enter Your Qualification here.." class="form-control" required <?php echo $a?>>
							</div>

                        <div>
						
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Index Number</label>
								<input type="text" placeholder="Enter Index Number Here.." name="nextofkin" class="form-control" required <?php echo $a?>>
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
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label> English</label>
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label> Kiswahili</label>
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label> Physics</label>
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> Chemistry</label>
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Biology</label>
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> Geography </label>
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label> History </label>
                                    <select name="math" id="" class="form-control" style="width:auto;" required <?php echo $a?>> 
                                        <option value="Select">Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C+">C+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div><br><br>
						<input type="submit" style="color:#BD0006;" name="submitBioData" class="form-control btn btn-info">
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