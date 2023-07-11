<h3>Add Category</h3>
<hr/>

<?php
    if (isset($msg)) {
        echo $msg;
    }
    
?>

<form action="http://localhost/mvc/category/insert" method="post">
    <label for="name">Category Name</label>
    <input type="text" name="name" id="name">

    
    <label for="title">Category Title</label>
    <input type="text" name="title" id="title">

    <input type="submit" value="Add">
</form>