
<?php
include('admin-header.php');
?>

<div class="row">
        <div class="small-8 columns">
<h3>View Customer Orders</h3>

</div>
<div class="small-4 columns">
<h4><a href="admin-dashboard.php">Back to Admin Dashboard</a></h4>

</div>
</div>
<hr/>

<div class = "row">
<div class="small-12 columns">
       
       <table style =" width:100%; display:flex;" >
       <tr>
       <td> <b/> Product Name </td>
       <td> <b/>Product Code </td>
       <td> <b/>Price </td>
       <td> <b/>Units </td>
       <td><b/> Total </td>
       <td><b/> Date </td>
       <td> <b/>Email </td>
       <td> <b/>Fulfil Order </td> 
       <td> <b/>Cancel </td>
       </tr>
       <?php 
         $result = $mysqli->query('SELECT * FROM orders');
         if($result === FALSE){
           die(mysql_error());
         }

         if($result){

           while($obj = $result->fetch_object()) {
          echo ' <tr>';
            echo '<td>'.$obj->product_name.'</td>';
           echo '<td>'.$obj->product_code.'</td>';
                     echo '<td>'.$obj->price.'</td>';
           echo '<td>'.$obj->units.'</td>';
           echo '<td>'.$obj->total.'</td>';
           echo '<td>'.$obj->date.'</td>';
           echo '<td>'.$obj->email.'</td>';
            echo '<td><a href = '."#".'> Fulfil Order </a></td>';
            echo '<td><a href = '."#".'> Cancel </a></td>';
           echo' </tr>';
            
           }
        }
             
        ?>
       </table>
        </div>
</div>

    

    <?php include('footer.php');?>