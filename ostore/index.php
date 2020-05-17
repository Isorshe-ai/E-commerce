<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

require('header.php');
?>






    <img data-interchange="[images/bolt-retina.jpg, (retina)], [images/bolt-landscape.jpg, (large)], [images/bolt-mobile.jpg, (mobile)], [images/bolt-landscape.jpg, (medium)]">
    <noscript><img src="images/bolt-landscape.jpg"></noscript>

    <div class="row" style="margin-top:6px;">
      <div class="small-8 columns">
      <input type = "search" name = "search" placeholder = "Search for products">
     <input type = "submit" value = "Search" name = "search">
</div>

<div class="small-4 columns">

            
              <select name = "category"> 
              <option>Filter by Category</option>

              <?php 
         $result = $mysqli->query('SELECT * FROM category');
         if($result === FALSE){
           die(mysql_error());
         }

         if($result){

           while($obj = $result->fetch_object()) {

            echo '<option value= '. ".$obj->category.". '>'.$obj->category.'</option>';
            
           }
        }
             
        ?>
        
              </select>
</div>
</div>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM products');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-3 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Name</strong>: '.$obj->product_name.' '.$obj->product_code.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>

  <?php  require('footer.php'); ?>
