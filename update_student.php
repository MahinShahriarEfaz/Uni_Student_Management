
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Student info</h1>

                    <?php
                            
                            require_once('inc/db_con.php');

                            if (isset($_GET['edit'])){

                                $edit_id=$_GET['edit'];

                                $select_student= "SELECT * FROM students WHERE student_id='$edit_id'";
                                $run_selection= mysqli_query($conn,$select_student);
                                $row_selection= mysqli_fetch_array($run_selection);

                               $student_name=$row_selection['student_name'];
                               $student_email=$row_selection['student_email'];
                               $student_phone=$row_selection['student_phone'];




                            }
                            
                            
                            
                            
                            
                            ?>


                    <div class="row">
                        <div class="col">
                            <form action="" method="post">
                               <div class="form-group">
                                
                                    <label>Student Name</label>
                                    <input type="text" name="student_name" value="<?php echo $student_name?>" class="form-control"/>                                   

                               </div> 

                               <div class="form-group">
                                
                                    <label>Student E-Mail</label>
                                    <input type="email" name="student_email" value="<?php echo $student_email?>" class="form-control"/>                                   

                               </div>
                               
                               <div class="form-group">
                                
                                    <label>Phone Number</label>
                                    <input type="text" name="student_phone" value="<?php echo $student_phone?>" class="form-control"/>                                   

                               </div> 

                               <div class="form-group">
                                
                                    <input type="submit" name="insert-btn" class="btn btn-success"/>                                   

                               </div> 

                            </form>

                            <?php
                            
                            require_once('inc/db_con.php');

                             if (isset($_POST['insert-btn'])){
                                
                                 $student_name = $_POST['student_name'];
                                 $student_email = $_POST['student_email'];
                                 $student_phone = $_POST['student_phone'];

                            if(empty($student_name) || empty($student_email) || empty($student_phone)){

                                echo "Fields cannot be empty";
                            }else{

                             $insert_student = "UPDATE students SET student_name='$student_name',student_email='$student_email', student_phone='$student_phone' WHERE student_id='$edit_id'";

                             $run_student= mysqli_query($conn,$insert_student);

                             if($run_student == true){

                                 echo "Data inserted";
                                 echo "<script> window.open('students.php','_self'); </script>";
                             } else{

                                 echo 'Try again';
                             }



                             }
                            }

                            // if (mysqli_connect_errno()){
                            //      echo "fail";
                            

                            //  }else{

                            //      echo "success";
                            //  }
                            
                            ?>

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