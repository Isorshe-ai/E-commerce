
<?php
include('admin-header.php');
?>

<div class="row">
        <div class="small-8 columns">
<h3>View Inventory</h3>

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
       <td> <b/>Product Description </td>
       <td> <b/>Quantity </td>
       <td><b/> Price </td>
       <td><b/> Category </td>
       <td> <b/>Edit </td>
       <td> <b/>Delete </td> 
       </tr>
       <?php 
         $result = $mysqli->query('SELECT * FROM products');
         if($result === FALSE){
           die(mysql_error());
         }

         if($result){

           while($obj = $result->fetch_object()) {
          echo ' <tr>';
            echo '<td>'.$obj->product_name.'</td>';
           echo '<td>'.$obj->product_code.'</td>';
           echo '<td>'.$obj->product_desc.'</td>';
           echo '<td>'.$obj->qty.'</td>';
           echo '<td>'.$obj->price.'</td>';
           echo '<td>'.$obj->category.'</td>';
            
            echo '<td><a href = '."#".'> Edit </a></td>';
            echo '<td><a href = '."#".'> Delete </a></td>';
           echo' </tr>';
            
           }
        }
             
        ?>
       </table>
        </div>
</div>

    

    <?php include('footer.php');?>