    <?php include "includes/admin_header.php"; ?>

    <div id="wrapper">



        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-6">
                            <?php //INSERT CATEGORIES
                                insertCategories();
                            ?>                            
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat_title">Category Title</label>
                                        <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Categories">
                                </div>
                            </form>
                            <?php // UPDATE AND INCLUDE QUERY
                                updateCategory();
                            ?>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php //FIND ALL CATEGORIES QUERY
                                            findAllCategories();
                                         ?>

                                         <?php // DELETE QUERY 
                                            deleteCategory();
                                          ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php"; ?>
