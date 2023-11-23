<?php 
    $title="posts";
    include("layout/head.php"); 
    include("helper/helper.php");
?>


    <body class="sb-nav-fixed">

        <?php include("layout/nav.php") ?>


        <div id="layoutSidenav">

            <?php include("layout/sidebar.php") ?>


            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">

                        <div class="d-flex">
                            <h1 class="my-4">Posts</h1>
                            <div class="my-4 ms-auto">
                                <button class="btn btn-primary btn-small">
                                    <a href="createPosts.php" class="nav-link text-light text-capitalize"> Add new posts</a>
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
                                All Posts
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT posts.id,posts.title,posts.status,posts.created_at,category.name as CategoryName,admin.name as Author FROM posts 
                                        INNER JOIN category ON posts.category_id=category.id
                                        INNER JOIN admin ON posts.admin_id=admin.id
                                        ORDER BY posts.id DESC";

                                            $stmt = $conn->query($sql);
                                            $posts = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            if ($posts) {
                                                foreach ($posts as $key => $post) { ?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo str_limit($post->title, 100); ?></td>
                                                        <td><?php echo $post->Author; ?></td>
                                                        <td><?php echo $post->CategoryName; ?></td>
                                                        <td><?php echo $post->created_at; ?></td>
                                                        <td>
                                                            <?php if ($post->status == 'active') { ?>
                                                                <span class="badge rounded-pill bg-primary">Published</span>
                                                            <?php } else { ?>
                                                                <span class="badge rounded-pill bg-danger">Draft</span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="postEdit.php?id=<?php echo $post->id ?>" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="postDelete.php?id=<?php echo $post->id ?>" onclick="return confirm('Are you sure to delete this post?')" class="btn btn-danger  btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
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

