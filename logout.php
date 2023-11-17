<?PHP

require_once('inc/db_con.php');
session_start ();
    echo "<script>window.open('login.php','_self');</script>";
session_destroy();
;