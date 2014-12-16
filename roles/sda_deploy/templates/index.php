<?php
   $user = $_SERVER['REMOTE_USER'];
   $krb5cc  = $_SERVER['KRB5CCNAME'];
   //echo $user;
   //echo $krb5cc;
   $src = substr($krb5cc, 5);
   $username = substr($user, 0, -11);
   //echo $username;
   if(strpos(file_get_contents("/etc/passwd"), $username) == false) {
       header('Location: /error.html');
   } else {
       $dest = "KERBEROS_TICKET_HOME/krb5cc_apache_".$username;
       //$dest = "/tmp/krb5cc_apache_".$username;
       //echo $dest;
       copy($src, $dest);
       header('Location: /sda');
   }
?>
