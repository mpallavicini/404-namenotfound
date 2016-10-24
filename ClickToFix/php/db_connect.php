<?php
   $db = mysqli_connect("localhost", "knakarmi2013", "uDAnmDgxt7", "knakarmi2013");
                        //address     username    password      database name
 

   if (mysqli_connect_error()) { //check for connection error
        echo mysqli_connect_error();
       exit();
   }
?>