<?php 

if (isset($_POST['create_post'])) {
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

    $query = "INSERT INTO posts(";
    $query .= "post_title, post_author, post_category_id, ";
    $query .= "post_status, post_image, post_date, post_tag, post_content, post_comment_count) ";
    $query .= "VALUES('{$title}', '{$author}', {$category}, '{$status}', '{$image}', now(), ";
    $query .= "'{$tags}', '{$content}', {$post_comment_count})";

	$result = mysqli_query($con, $query);
	if (!$result) {
		die("Query Failed " . mysqli_error($con));
	}

	
}

 ?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
	<label for="title">Title:</label>
	<input class="form-control" type="text" name="title">
</div>

<div class="form-group">
	<label for="author">Author:</label>
	<input class="form-control" type="text" name="author">
</div>

<div class="form-group">
	<label for="post_category_id">Post Category ID:</label>
	<input class="form-control" type="text" name="post_category_id">
</div>

<div class="form-group">
	<label for="post_status">Status:</label>
	<input class="form-control" type="text" name="post_status">
</div>

<div class="form-group">
	<label for="post_image">Post Image:</label>
	<input class="form-control" type="file" name="post_image">
</div>

<div class="form-group">
	<label for="post_tags">Post Tags:</label>
	<input class="form-control" type="text" name="post_tags">
</div>

<div class="form-group">
	<label for="post_content">Post Content:</label>
	<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>

<div class="form_group">
	<button class="btn btn-primary btn-md" name="create_post">Submit Post</button>
</div>

</form>