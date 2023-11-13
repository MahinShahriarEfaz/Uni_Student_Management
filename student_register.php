
<?php require_once("inc/top.php");?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        
		<?php require_once('inc/sidebar.php');?>
		
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
				
				
                <?php require_once('inc/topbar.php');?>
				
				
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Register Your Account</h1>

                    
                    <div class="row">
                        <div class="col">
                            <form action="" method="post">
                               <div class="form-group">
                                
                                    <label>Student Name</label>
                                    <input type="text" name="student_name" class="form-control"/>                                   

                               </div> 
                               <div class="form-group">
                                
                                    <label>Your Aplication ID</label>
                                    <input type="number" name="application_id" class="form-control"/>                                   

                               </div> 
                               <div class="form-group">
                                
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control"/>                                   

                               </div>

                               <div class="form-group">
                                
                                    <label>Repeat Password</label>
                                    <input type="password" name="re_pass" class="form-control"/>                                   

                               </div>

                               <div class="form-group">
                                
                                    <label>Student E-Mail</label>
                                    <input type="email" name="student_email" class="form-control"/>                                   

                               </div>
                               
                               <div class="form-group">
                                
                                    <label>Phone Number</label>
                                    <input type="number" name="student_phone" class="form-control"/>                                   

                               </div> 
                               

                               <div class="form-group">
                                
                                    <input type="submit" name="insert-btn" class="btn btn-success"/>                                   

                               </div> 

                            </form>

                            <?php
                            
                            require_once('inc/db_con.php');

                             if (isset($_POST['insert-btn'])){
                                
                                 $student_name = $_POST['student_name'];
                                 $application_id = $_POST['application_id'];
                                 $password = $_POST['pass'];
                                 $repeat_password = $_POST['re_pass'];
                                 $student_email = $_POST['student_email'];
                                 $student_phone = $_POST['student_phone'];
                                 

                            if(empty($student_name) || empty($application_id) || empty($password) ||empty($student_email) || empty($student_phone)){

                                echo "Fields cannot be empty";
                            }else{
                               
                                    $check_email_user = "SELECT * FROM user WHERE user_email='$student_email'";
                                    $run_check_email_user = mysqli_query($conn, $check_email_user);
                                    $check_email_register = "SELECT * FROM registration WHERE student_email='$student_email'";
                                    $run_check_email_register = mysqli_query($conn, $check_email_register); 
                                    
                                if(mysqli_num_rows($run_check_email_user)>0 || mysqli_num_rows($run_check_email_register)>0){

                                    echo "Email Already has been used";
                                    }else{
                                        if($password==$repeat_password){

                                            $select_salt = "SELECT * FROM registration order by application_id DESC LIMIT 1";
                                            $run_salt = mysqli_query($conn, $select_salt);
                                            $row_salt= mysqli_fetch_array($run_salt);
                                            $salt = $row_salt['salt'];
                                            $secure_password = crypt($password,$salt);
                                        
                                            $insert_student = "INSERT INTO registration(student_name,application_id, student_password, student_phone, student_email) VALUES ('$student_name','$application_id', '$secure_password','$student_phone', '$student_email')";

                                            $run_insert_student= mysqli_query($conn,$insert_student);
        
                                            if($run_insert_student == true){
        
                                                echo "Data inserted";
                                            } else{

                                                echo 'Try again';
                                            }
                                        
                                        } else{
                                            echo "Passwords did not match";
                                        }

                                }
                            }
                        }








                                // if($password==$repeat_password){

                                //     $select_salt = "SELECT * FROM registration order by application_id DESC LIMIT 1";
                                //     $run_salt = mysqli_query($conn, $select_salt);
                                //     $row_salt= mysqli_fetch_array($run_salt);
                                //     $salt = $row_salt['salt'];
                                //     $secure_password = crypt($password,$salt);
                                    

                                //     $check_email_user = "SELECT * FROM user WHERE user_email='$student_email'";
                                //     $run_check_email_user = mysqli_query($conn, $check_email_user);
                                //     $check_email_register = "SELECT * FROM registration WHERE student_email='$student_email'";
                                //     $run_check_email_register = mysqli_query($conn, $check_email_register); 
                                    

                                //     if(mysqli_num_rows($run_check_email_user)>0 || mysqli_num_rows($run_check_email_register)>0){

                                //         echo "Email Already has been used";
                                //     }else{

                                //         $insert_student = "INSERT INTO registration(student_name,application_id, student_password, student_phone, student_email) VALUES ('$student_name','$application_id', '$secure_password','$student_phone', '$student_email')";

                                //     $run_insert_student= mysqli_query($conn,$insert_student);

                                //     if($run_insert_student == true){

                                //         echo "Data inserted";
                                //     } else{

                                //         echo 'Try again';
                                //     }
                                //         }

                                    


                                // }else{
                                //     echo "Passwords did not match";
                                // }

                                // }
                                // }

                            // if (mysqli_connect_errno()){
                            //      echo "fail";
                            

                            //  }else{

                            //      echo "success";
                            //  }
                            
                            ?>

                        </div>
                    </div>

                </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

<?php require_once("inc/footer.php");?>