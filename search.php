<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php 

                    if (isset($_POST['submit'])) {
                        $search = $_POST['search'];
                        
                        $query = "SELECT * FROM posts ";
                        $query .= "WHERE post_tag LIKE '%$search%'";

                        if (!$query) {
                            die("Query Error " . mysqli_error($con));
                        }

                        $result = mysqli_query($con, $query);

                        $count = mysqli_num_rows($result);

                        if(!$result){
                            die("query failed");
                        }

                        if ($count == 0) {
                            echo "<h1> NO RESULT </h1>";
                        }else{

                    while ($row = mysqli_fetch_assoc($result)) {
                        $postTitle = $row['post_title'];
                        $postAuthor = $row['post_author'];
                        $postDate = $row['post_date'];
                        $postImage = $row['post_image'];
                        $postContent = $row['post_content'];
                 ?> 

<!--                 First Blog Post -->
                <h2>
                    <a href="#"><?php echo $postTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postDate ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $postImage ?>" alt="">
                <hr>
                <p><?php echo $postContent ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <?php 
                    }
                    } 
                }

                    ?>

            </div>

<?php include "includes/sidebar.php" ?>            

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>
