
<?php
include('admin-header.php');
?>




<div class="row">
<div class="small-12 columns">
<h1>Products Categories</h1>
</div>
</div>

<div class = "row">
<div class="small-6 columns">
        <h2>List of categories</h2>
        <ol>
        <?php 
         $result = $mysqli->query('SELECT * FROM category');
         if($result === FALSE){
           die(mysql_error());
         }

         if($result){

           while($obj = $result->fetch_object()) {

            
            
             echo '<li>'.$obj->category.'</li>';
           }
        }
             
        ?>
        </ol>
        </div>
</div>
<hr/>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:30px;">
    <?php 
if (isset($_POST['submit'])){
    $category = $_POST["category"];
if($mysqli->query("INSERT INTO category (category) VALUES('$category')")){
	
} ?>
<script>
if (confirm('New category has been successfully added to the inventor, Do you want to add another Category?')) {
window.alert("Add another Category");
window.location.href= "category.php";
} else {
window.alert("Return to Admin Dashboard");
window.location.href= "admin-dashboard.php";
}
</script>
<?php
//header ("location:category.php");
}?>
      <div class="row">
        <div class="small-8">
<h3>Add New category</h3>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">New Category</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter a category name" name="category" required>
            </div>
          
                        
            <div class="small-8 columns">
              <input type="submit" id="right-label" name ="submit" value="Add category" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
               </div>
               </div>
         
        </div>
         </div>
    </form>

    <?php include('footer.php');?>