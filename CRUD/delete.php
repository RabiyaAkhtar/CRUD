<h1>delete page</h1>


<?php

require_once("dbcon.php");

if (isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];

    $r = mysqli_query( $con,'DELETE FROM users WHERE user_id = '.$id);
        if ($r){

            ?>
            <script>
                window.location = 'users.php?deleted=1';
            </script>
            <?php

        }
        else{
        echo "error in deletion";
        echo mysqli_error($con);
        }
}

?>