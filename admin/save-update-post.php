<?php
include "config.php";

if(empty($_FILES['new-image']['name'])){
  $file_name =$_POST['old-image'];
}else{


    $errors = array();

    $file_name = $_FILES["new-image"]["name"];
    $file_size = $_FILES["new-image"]["size"];
    $file_tmp = $_FILES["new-image"]["tmp_name"];
    $file_type = $_FILES["new-image"]["type"];
    $temp = explode(".", $file_name);
$file_ext = strtolower(end($temp));

    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "This Extensions File Is Not Allowed, Please choose a JPEG, JPG, PNG";

    }
    if ($file_size > 2097152) {
        $errors[] = "File Size must be 2mb or lower";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "upload/" . $file_name);
    } else {
        print_r($errors);
        die();
    }
}


$post_title = mysqli_real_escape_string($conn, $_POST["post_title"]);
$post_desc = mysqli_real_escape_string($conn, $_POST["postdesc"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);
$post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);

$sql = "UPDATE post SET title='{$post_title}', description='{$post_desc}', category={$category}, post_img='{$file_name}' WHERE post_id={$post_id}";




 $result = mysqli_query($conn,$sql);

if($result){
    header("location: {$hostname}/admin/post.php");
}
else{
    echo"query failed";
}

?>