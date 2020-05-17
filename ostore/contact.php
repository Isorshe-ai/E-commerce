<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include ('header.php');
?>






    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <p>Get in touch. Email us at <a href="mailto:davidikangbo@gmail.com">Enquiries, Sales</a></p>

        <?php include('footer.php'); ?>