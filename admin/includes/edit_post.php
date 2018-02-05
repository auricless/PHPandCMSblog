<?php 

if (isset($_GET['edit'])) {
	$id_to_edit = $_GET['edit'];

	$query = "SELECT * FROM posts WHERE post_id = $id_to_edit";
	$result = confirmQuery($query);

	while ($row = mysqli_fetch_assoc($result)) {
		$title = $row['post_title'];
		$author = $row['post_author'];
		$post_category_id = $row['post_category_id'];
		$status = $row['post_status'];
		$image = $row['post_image'];
		$tags = $row['post_tag'];
		$content = $row['post_content'];
	}
	
}

if (isset($_GET['edit'])) {
	$id_to_update = $_GET['edit'];
}

if (isset($_POST['update_post'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['post_category_id'];
    $status = $_POST['post_status'];
    $image = $_FILES['post_image']['name'];
    $image_temp = $_FILES['post_image']['tmp_name'];
    $date = date('d-m-y');
    $tags = $_POST['post_tags'];
    $content = $_POST['post_content'];
    $post_comment_count = 4;

    move_uploaded_file($image_temp, "../images/$image");

    if(empty($image)){
    	$query = "SELECT * FROM posts WHERE post_id = $id_to_update";

    	$result = confirmQuery($query);
    	while($row = mysqli_fetch_assoc($result)) {
    		$image = $row['post_image'];
    	}
    }

    $query = "UPDATE posts SET";
    $query .= " post_title = '{$title}',";
    $query .= "post_author = '{$author}',";
    $query .= "post_category_id = '{$category}',";
    $query .= "post_date = now(),";
    $query .= "post_status = '{$status}',";
    $query .= "post_tag = '{$tags}',";
    $query .= "post_content = '{$content}',";
    $query .= "post_image = '{$image}' ";
    $query .= "WHERE post_id = {$id_to_update}";

	confirmQuery($query);
	header("Location: posts.php");
}
 ?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
	<label for="title">Title:</label>
	<input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
</div>

<div class="form-group">
	<label for="author">Author:</label>
	<input class="form-control" type="text" name="author" value="<?php echo $author; ?>">
</div>

<div class="form-group">
	<select name="post_category_id" id="">
<?php 
	$query = "SELECT * FROM categories";
	$result = confirmQuery($query);
	while ($row = mysqli_fetch_assoc($result)) {
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		echo "<option value='{$cat_id}'>{$cat_title}</option>";
	}
 ?>
 	</select>
</div>

<div class="form-group">
	<label for="post_status">Status:</label>
	<input class="form-control" type="text" name="post_status" value="<?php echo $status; ?>">
</div>

<div class="form-group">
	<label for="post_image">Post Image:</label>
	<img width="100px" src="../images/<?php echo $image ?>" name="post_image" alt="image">
	<input class="form-control" type="file" name="post_image">
</div>

<div class="form-group">
	<label for="post_tags">Post Tags:</label>
	<input class="form-control" type="text" name="post_tags" value="<?php echo $tags; ?>">
</div>

<div class="form-group">
	<label for="post_content">Post Content:</label>
	<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $title; ?></textarea>
</div>

<div class="form_group">
	<button class="btn btn-primary btn-md" name="update_post">Update Post</button>
</div>

</form>