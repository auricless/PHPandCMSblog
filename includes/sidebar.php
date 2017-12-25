

<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                    <?php 
                        $query = "SELECT * FROM categories";
                        $result = mysqli_query($con, $query);
                     ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php while ($row = mysqli_fetch_assoc($result)) {
                                    $cat_id = $row['cat_id'];
                                    $catTitle = $row['cat_title'];
                                    echo "<li><a href='category.php?category={$cat_id}'>{$catTitle}</a></li>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <?php include "widgets.php"; ?>

            </div>