<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

include ('header.php');
?>



    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p>Online Store is a project on E-Commerce Website. All products listed are fake. This project just gives a preview to what a real world implementation of E-Commerce Website will look like. Well if you do like the website then visit
        <a href="http://www.webproject.com.ng" target="_blank" title="Dibia Solutions">Dibia Solutions.
<img  src = "images/IMG-20200417-WA0006.jpg" style = "display:block; margin-left:auto; margin-right:auto;"> </a></p>
</div>
</div>
        
        <?php include('footer.php');?>