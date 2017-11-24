<?php 

function confirmQuery($query){
    global $con;
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query Failed " . mysqli_error($con));
    }
}

function insertCategories(){
	global $con;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field can't be empty";
        }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('${cat_title}')";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Query failed " . mysqli_error($con));
            }
        }
    }
}

function findAllCategories(){
	global $con;
	$query = "SELECT * FROM categories";

    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deleteCategory(){
	global $con;
	if (isset($_GET['delete'])) {
	    $get_cat_id = $_GET['delete'];

	    $query = "DELETE FROM categories ";
	    $query .= "WHERE cat_id = {$get_cat_id}";

	    $result = mysqli_query($con, $query);
	    header("Location: categories.php");

	    if(!$result){
	        die("Query Failed " . mysqli_error($con));
	    }
	}
}

function updateCategory(){
	global $con;
	if (isset($_GET['edit'])) {
        $get_cat_id = $_GET['edit'];
        
        include "includes/edit_categories.php";

    }
}

 ?>