
<?php
include('admin-header.php');
?>

    
    <?php 

if (isset($_POST['submit'])){
    $product_code = $_POST["product_code"];
    $product_name = $_POST["product_name"];
    $product_desc = $_POST["product_desc"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
   // $image = $_FILES['image'];
    //file section
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
$fileName = $_FILES['uploadedFile']['name'];
$fileSize = $_FILES['uploadedFile']['size'];
$fileType = $_FILES['uploadedFile']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
$allowedfileExtensions = array('jpg', 'gif', 'png');
if (in_array($fileExtension, $allowedfileExtensions)) {
    $uploadFileDir = './images/products/';
    $dest_path = $uploadFileDir . $newFileName;
     
    if(move_uploaded_file($fileTmpPath, $dest_path))
    {
        if($mysqli->query("INSERT INTO products (product_code, product_name, product_desc, product_img_name, qty, price, category) VALUES('$product_code', '$product_name','$product_desc', '$newFileName', '$quantity','$price', '$category')")){
        } ?>
            <script>
            if (confirm('New Product has been successfully added to the inventor, Do you want to add another product?')) {
  window.alert("Add another Product");
  window.location.href= "add_inventory.php";
} else {
    window.alert("Return to Inventory");
  window.location.href= "view_inventory.php";
}
            </script>
            <?php
       
    //    header ("location:view_inventory.php");
      
    }
    else
    {
      $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
    }
}
        }

}?>
      <div class="row">
        <div class="small-8 columns">
<h3>Add New Product to the inventory</h3>

</div>
<div class="small-4 columns">
<h4><a href="admin-dashboard.php">Back to Admin Dashboard</a></h4>

</div>
</div>
<hr/>
<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">product Code</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter a product code" name="product_code" required>
            </div>
</div>
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">product Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter a product name" name="product_name" required>
            </div>
            </div>
           <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Product Description</label>
            </div>
            <div class="small-8 columns">
            <textarea id="right-label"  name="product_desc" required> Enter description for the product</textarea>
              </div>
              </div>
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline"> Category</label>
            </div>
            <div class="small-8 columns">
              <select name = "category"> 
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
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Quantity</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label" placeholder="Enter the quantity" name="quantity" required>
            </div>
            </div>
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Price</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label" placeholder="Enter the unit price" name="price" required>
            </div>
            </div>
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Upload an Image</label>
            </div>
            <div class="small-8 columns">
              <input type="file" id="right-label"  name="uploadedFile" required>
            </div>
          
                        
            <div class="small-8 columns">
              <input type="submit" id="right-label" name ="submit" value="Add To Inventory" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
               </div>
               </div>
         
       
    </form>

    <?php include('footer.php');?>