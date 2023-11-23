<?php $title = "categories" ?>
<?php include("layout/head.php")?>

<body class="sb-nav-fixed">

    <?php include("layout/nav.php")?>


    <div id="layoutSidenav">

        <?php include("layout/sidebar.php")?>

        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">

                    <div class="d-flex">
                        <h1 class="my-4">Categories</h1>
                        <div class="my-4 ms-auto">
                            <button class="btn btn-primary btn-small">
                                <a href="createCategory.php" class="nav-link text-light text-capitalize"> Add new
                                    category</a>
                            </button>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Category Lists
                        </div>

                        <?php
                                if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php  
                            }
                          unset($_SESSION['success']);
                        ?>

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                            $sql = "SELECT * FROM category";
                                            $stmt = $conn->query($sql);
                                            $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            
                                            if($categories !=null){
                                                foreach($categories as $key=> $category){?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $category->name; ?></td>
                                        <td><?php echo $category->slug; ?></td>
                                        <td>
                                            <a href="categoryEdit.php?id=<?php echo $category->id; ?>"
                                                class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="categoryDelete.php?id=<?php echo $category->id; ?>"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    <?php   
                                            }
                                            }

                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>

            <?php include("layout/footer.php")?>

        </div>
    </div>

    <?php include("layout/foot.php")?>