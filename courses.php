
<?php require_once("inc/top.php")?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        
		<?php require_once('inc/sidebar.php')?>
		
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
				
				
                <?php require_once('inc/topbar.php')?>
				
				
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Courses </h1>
                    <div class="row">
                        <div class="col">

                        <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Couse</th>
                                            <th>Title</th>
                                            <th>Days</th>
                                            <th>Time</th>
                                            <th>Add</th>
                                    
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr> -->
                                    </tfoot>
                                    <tbody>

                                    <?php 
                                    
                                        require_once("inc/db_con.php");

                                        $select_courses="SELECT * FROM courses";
                                        $run_courses= mysqli_query($conn, $select_courses);
                                    
                                    while($row_courses = mysqli_fetch_array($run_courses)){

                                        $course=$row_courses['course'];
                                        $course_title=$row_courses['course_title'];
                                      
                                        $course_days=$row_courses['course_days'];
                                        $course_time=$row_courses['course_time'];

                                    
                                    ?>
                                     <tr>

                                      <td><?php echo $course ?></td>
                                      <td><?php echo $course_title ?></td> 
                                     
                                      <td><?php echo $course_days ?></td> 
                                      <td><?php echo $course_time?></td>
                                      
                                        

                                     </tr>

                                     <?php  } ?>
                                    </tbody>
                                </table>
                                <div> <table>
                                    <!-- <tr>
                                    
                                
                                <td><a href="delete_students.php" class="btn btn-danger"> Click to DELETE<td>
                                
                                    <tr> -->
                                    </table>
                                </div>
                            </div>
                            
                        </div>
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