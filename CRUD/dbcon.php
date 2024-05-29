<?php

$con = mysqli_connect("localhost","root","","nftp_ds");
if( $con != false){
    // echo "connected";
}
else{
    echo "error in db connection";
}

?>
