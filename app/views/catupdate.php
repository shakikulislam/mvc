<h3>Update Category</h3>
<hr/>

<?php
    if (isset($msg)) {
        echo $msg;
    }
    
?>

<form action="<?php echo BASE_URL; ?>category/update" method="post">

    <?php 
        foreach ($getCatById as $value) {
    ?>
    <input type="hidden" name="id"  value="<?php echo $value['id'] ?>">

    <label for="name">Category Name</label>
    <input type="text" name="name" id="name" value="<?php echo $value['name'] ?>">

    
    <label for="title">Category Title</label>
    <input type="text" name="title" id="title" value="<?php echo $value['title'] ?>">

    <input type="submit" value="Update">
    <?php }?>
</form>