<?php $title= 'tags'; include("layout/head.php") ?>

    <body class="sb-nav-fixed">

        <?php include("layout/nav.php") ?>


        <div id="layoutSidenav">
            
            <?php include("layout/sidebar.php") ?>


            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">

                        <div class="d-flex">
                            <h1 class="my-4">Tags</h1>
                            <div class="my-4 ms-auto">
                                <button class="btn btn-primary btn-small">
                                    <a href="createTags.php" class="nav-link text-light text-capitalize"> Add new tags</a>
                                </button>
                            </div>
                        </div>

                        <?php
                        if (isset($_SESSION['success'])) { ?>                           
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>  <?php echo $_SESSION['success']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php  
                          }
                          unset($_SESSION['success']);
                        ?>
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Tags
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                            $sql = "SELECT * FROM tag";
                                            $stmt = $conn->query($sql);
                                            $tags = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            
                                            if($tags !=null){
                                                foreach($tags as $key=> $tag){?>
                                                <tr>
                                                    <td><?php echo $key+1; ?></td>
                                                    <td><?php echo $tag->name; ?></td>
                                                    <td><?php echo $tag->slug; ?></td>                                             
                                                    <td>
                                                        <a href="tagEdit.php?id=<?php echo $tag->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="tagDelete.php?id=<?php echo $tag->id; ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i></a>
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

                <?php include("layout/footer.php") ?>

            </div>
        </div>

<?php include("layout/foot.php") ?>
