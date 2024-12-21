<?php
  
   include "config.php";
//     if($_SESSION["user_role"]=="0")
// {
//     header("Location: {$hostname}/admin/post.php");

// }

    $postid=$_GET['id'];
    $catid=$_GET['catid'];

    $sql1="SELECT * FROM post WHERE post_id= {$postid}";
    $result = mysqli_query($conn,$sql1) or die("QUERY FAILED");
   $row = mysqli_fetch_array($result);

   unlink("upload/".$row['post_img']);



    $sql="DELETE FROM post WHERE post_id={$postid};";
    $sql .= "UPDATE category SET post = post-1 WHERE category_id={$catid}";


    if(mysqli_multi_query($conn,$sql)){
        header("Location: {$hostname}/admin/post.php");
    }else{
        echo "<P style='color:red';margin:10px 0;text-align:center;> Can\'t Delete User Record";

    }

    mysqli_close($conn)


?>