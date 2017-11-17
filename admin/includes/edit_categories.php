                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="edit_cat">Edit Category</label>
                                            <?php // READ QUERY 
                                            if (isset($_GET['edit'])) {
                                                $get_cat_id = $_GET['edit'];

                                                $query = "SELECT * FROM categories ";
                                                $query .= "WHERE cat_id = {$get_cat_id}";

                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $cat_title = $row['cat_title'];
                                            ?>
                                            <input class="form-control" type="text" name="edit_cat" value="<?php echo $cat_title; ?>">
                                               <?php }
                                            }
                                            ?>
                                            <?php // UPDATE QUERY
                                                if (isset($_POST['update_category'])) {
                                                    $cat_title = $_POST['edit_cat'];

                                                    $query = "UPDATE categories SET cat_title = '{$cat_title}' ";
                                                    $query .= "WHERE cat_id = {$get_cat_id}";

                                                    $result = mysqli_query($con, $query);

                                                    if (!$result) {
                                                        die("QUERY failed" . mysqli_error($con));
                                                    }
                                                }
                                            ?>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Categories">
                                </div>
                            </form>