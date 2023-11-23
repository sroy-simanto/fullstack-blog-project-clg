<?php
 $title="categories";
 include("layout/head.php");
?>

<body class="sb-nav-fixed">

    <?php include("layout/nav.php")?>

    <div id="layoutSidenav">

        <?php include("layout/sidebar.php")?>

        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4 py-3">

                    <h1>Create Category</h1>

                    <?php
                                                                
                                $errors = [];
                                $data   = [];
                            
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                $category_name     = $_POST['category_name'];
                                $category_slug     = $_POST['category_slug']??"";



                                if (empty($category_name)) {
                                    $error['categoryName'] = "Category name is required";
                                } else {
                                    $data['categoryName'] =  $category_name;
                                }

                                if (empty($category_slug)) {
                                    $error['categorySlug'] = "Category slug is required";
                                } else {
                                    $data['categorySlug'] =  $category_slug;
                                }

                                if (empty($error['categoryName']) || empty($error['categorySlug'])) {


                                    try {


                                        $sql = "INSERT INTO category(name,slug)VALUES(:name,:slug)";

                                        if ($stmp = $conn->prepare($sql)) {

                                            $stmp->bindParam(':name', $data['categoryName'], PDO::PARAM_STR);
                                            $stmp->bindParam(':slug', $data['categorySlug'], PDO::PARAM_STR);

                                            if ($stmp->execute()) {

                                                $_SESSION['success'] = 'Category insert successfully';
                                                // header('location:category.php');
                                                echo '<script>window.location.href = "categories.php";</script>';
                                              
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        die('Could insert category' . $sql . $e->getMessage());
                                    }
                                }
                            }
                            ?>

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" />
                                    <span class="form-text text-danger">
                                        <?php echo  $error['categoryName'] ?? ''; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Slug</label>
                                    <input type="text" name="category_slug" class="form-control" id="slug" />
                                    <span class="form-text text-danger">
                                        <?php echo  $error['categorySlug'] ?? ''; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                    </form>

                </div>
            </main>

            <?php include("layout/footer.php")?>

        </div>
    </div>

    <?php include("layout/foot.php")?>