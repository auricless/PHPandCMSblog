                        <?php
                            if (isset($_GET['delete'])) {
                                $id_to_del = $_GET['delete'];

                                $query = "DELETE FROM posts ";
                                $query .= "WHERE post_id = $id_to_del";
                                confirmQuery($query);
                                header("Location: posts.php");
                            }
                          ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM posts";
                                    if (!$query) {
                                        echo "query failed";
                                    }
                                    $result = mysqli_query($con, $query);
                                    if (!$result) {
                                        die(mysqli_error($con));
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $id = $row['post_id'];
                                        $author = $row['post_author'];
                                        $title = $row['post_title'];

                                        $category = $row['post_category_id'];
                                        $cat_query = "SELECT * FROM categories WHERE cat_id = $category";
                                        $cat_result = confirmQuery($cat_query);
                                        while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                                            $category_title = $cat_row['cat_title'];
                                        }

                                        $status = $row['post_status'];
                                        $image = $row['post_image'];
                                        $tag = $row['post_tag'];
                                        $comment = $row['post_comment_count'];
                                        $date = $row['post_date'];
                                echo
                                "<tr>
                                    <td>{$id}</td>
                                    <td>{$author}</td>
                                    <td>{$title}</td>
                                    <td>{$category_title}</td>
                                    <td>{$status}</td>
                                    <td><img width='100px' class='img-responsive' src='../images/{$image}'' alt='image'></td>
                                    <td>{$tag}</td>
                                    <td>{$comment}</td>
                                    <td>{$date}</td>
                                    <td><a href='posts.php?delete={$id}'>Delete</a></td>
                                    <td><a href='posts.php?source=edit_post&edit={$id}'>Edit</a></td>
                                </tr>";
                                
                                    } 
                                ?>
                            </tbody>
                        </table>