<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                 <div class="post-container">
                    <?php $sql1="SELECT * FROM category WHERE category_id={$categoryID}";
  $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
$row1=mysqli_fetch_assoc($result1);
?>

<h2 class="page-heading"><?php echo $row1['category_name']?></h2>

<?php

include "config.php";
if (isset($_GET['cid'])) {
    $categoryID = $_GET["cid"];
}

$limit = 3;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
$sql = "SELECT post.post_id,post.title,post.description,post.post_date,post.category,post.post_img,
category.category_name,post.author,user.username FROM post 
 LEFT JOIN category ON post.category = category.category_id
 LEFT JOIN user ON post.author = user.user_id
 WHERE post.category = {$categoryID}
 ORDER BY post.post_id 
  DESC LIMIT {$offset},{$limit}";

$result = mysqli_query($conn, $sql) or die("Query Failed");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    

?>

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']?>"><img src="admin/upload/<?php echo $row['post_img']?>" alt="img"/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']?>'><?php echo $row['title']?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category']?>'><?php echo $row['category_name']?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['author']?>'><?php echo $row['username']?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php 
                                       if(strlen($row['description']) > 130) {
                                        echo substr($row['description'], 0, 130) . "...";
                                    } else {
                                        echo $row['description'];
                                    }
                                    
                                        ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                                          
<?php }}else{
    echo "no record found";
    }

if (mysqli_num_rows($result1) > 0) {
    $total_rec = $row1['post'];


   $total_page = ceil($total_rec / $limit);
    echo " <ul class='pagination '>";
    if ($page > 1) {
        echo '<li><a href="category.php?cid='.$categoryID .'&page='.($page - 1).'">Prev</a></li>';
    }
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li class="' . $active . '"><a href="category.php?cid='.$categoryID .'&page=' . $i . '">' . $i . '</a></li>';
    }
    if ($total_page > $page) {
        echo '<li><a href="category.php?cid='.$categoryID .'&page=' . ($page + 1) . '">Next</a></li>';
    }
   echo " </ul>";
}
?>
        </div><!-- /post-container -->
    </div>
         <?php include 'sidebar.php'; ?>
            </div>
           
        </div>
      </div>
  
<?php include 'footer.php'; ?>
