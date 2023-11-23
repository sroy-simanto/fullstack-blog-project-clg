<?php $title="tags"; include("layout/head.php") ?>

<body class="sb-nav-fixed">
    
    <?php include("layout/nav.php") ?>


    <div id="layoutSidenav">
        
        <?php include("layout/sidebar.php") ?>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 py-3">
                    <h1>Create Tag</h1>

                    <?php
                                                                
                        $errors = [];
                        $data   = [];
                            
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                $tag_name     = $_POST['tag_name'];
                                $tag_slug     = $_POST['tag_slug']??"";



                                if (empty($tag_name)) {
                                    $error['tagName'] = "Tag name is required";
                                } else {
                                    $data['tagName'] =  $tag_name;
                                }

                                if (empty($tag_slug)) {
                                    $error['tagSlug'] = "Tag slug is required";
                                } else {
                                    $data['tagSlug'] =  $tag_slug;
                                }

                                if (empty($error['tagName']) || empty($error['tagSlug'])) {


                                    try {


                                        $sql = "INSERT INTO tag(name,slug)VALUES(:name,:slug)";

                                        if ($stmp = $conn->prepare($sql)) {

                                            $stmp->bindParam(':name', $data['tagName'], PDO::PARAM_STR);
                                            $stmp->bindParam(':slug', $data['tagSlug'], PDO::PARAM_STR);

                                            if ($stmp->execute()) {

                                                $_SESSION['success'] = 'Tag insert successfully';
                                                // header('location:tag.php');
                                                echo '<script>window.location.href = "tags.php";</script>';
                                              
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        die('Could insert tag' . $sql . $e->getMessage());
                                    }
                                }
                            }
                            ?>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mt-3">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="tag_name" class="form-label">Title</label>
                                    <input type="text" name="tag_name" id="category_name" class="form-control" placeholder="Title" />
                                    <span class="form-text text-danger">
                                        <?php echo  $error['tagName'] ?? ''; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="tag_slug" class="form-control" id="slug" placeholder="Slug" />
                                    <span class="form-text text-danger">
                                        <?php echo  $error['tagSlug'] ?? ''; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                    </form>

                </div>
            </main>

            <?php include("layout/footer.php") ?>

        </div>
    </div>

<?php include("layout/foot.php") ?>
