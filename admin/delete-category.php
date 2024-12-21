<?php
  
    include "config.php";
    if($_SESSION["user_role"]=="0")
{
    header("Location: {$hostname}/admin/post.php");

}

    $categoryID=$_GET['id'];

    $sql="DELETE FROM category WHERE category_id={$categoryID}";

    if(mysqli_query($conn,$sql)){
        header("Location: {$hostname}/admin/category.php");
    }else{
        echo "<P style='color:red';margin:10px 0;text-align:center;> Can\'t Delete User Record";

    }

    mysqli_close($conn)


?>