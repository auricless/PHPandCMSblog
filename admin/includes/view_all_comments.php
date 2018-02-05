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
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM comments";
                                    if (!$query) {
                                        echo "query failed";
                                    }
                                    $result = mysqli_query($con, $query);
                                    if (!$result) {
                                        die(mysqli_error($con));
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $id = $row['comment_id'];
                                        $author = $row['comment_author'];
                                        $post = $row['comment_post_id'];
                                        $status = $row['comment_status'];
                                        $content = $row['comment_content'];
                                        $date = $row['comment_date'];
                                echo
                                "<tr>
                                    <td>{$id}</td>
                                    <td>{$author}</td>
                                    <td>{$post}</td>
                                    <td>{$status}</td>
                                    <td>{$content}</td>
                                    <td>{$date}</td>
                                    <td><a href='posts.php?delete={$id}'>Delete</a></td>
                                    <td><a href='posts.php?source=edit_comment&edit={$id}'>Edit</a></td>
                                </tr>";
                                
                                    } 
                                ?>
                            </tbody>
                        </table>