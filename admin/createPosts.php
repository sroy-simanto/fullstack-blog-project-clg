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
                <div class="container-fluid px-4 py-3">
                    <h1>Create Post</h1>

                    <?php
                                                                
                                $errors = [];
                                $data   = [];
                            
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                $title       = inputValidate($_POST['title']);
                                $slug        = str_slug(inputValidate($_POST['slug']));
                                $description = $_POST['description'];
                                $category    = $_POST['category'] ?? '';
                                $tags        = $_POST['tags'] ?? '';
                                $status      = $_POST['status'] ?? '';

                                $fileName    = $_FILES['image']['name'];
                                $fileTmp     = $_FILES['image']['tmp_name'];
                                $fileSize    = $_FILES['image']['size'];



                                if (empty($title)) {
                                    $error['title'] = 'Post title is required';
                                } else {
                                    $data['title'] = $title;
                                }
                                if (empty($slug)) {
                                    $error['slug'] = 'Post slug is required';
                                } else {
                                    $data['slug'] = $slug;
                                }
                                if (empty($description)) {
                                    $error['description'] = 'Post description is required';
                                } else {
                                    $data['description'] = $description;
                                }
                                if (empty($category)) {
                                    $error['category'] = 'Category is required';
                                } else {
                                    $data['category'] = $category;
                                }
        
                                if (is_array_empty($tags)) {
                                    $data['tags'] = $tags;
                                } else {
                                    $error['tags'] = 'Tag is required';
                                }
        
                                if (empty($status)) {
                                    $error['status'] = 'Status is required';
                                } else {
                                    $data['status'] = $status;
                                }
        
                                $ext           = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                                $allowItem     = array('jpg', 'jpeg', 'png', 'webp');
                                $uniqueImgName = uniqid() . time() . '.' . $ext;
                                $upload_Image  = 'uploads/post/' . $uniqueImgName;
        
                                if (empty($fileName)) {
                                    $error['image'] = "Post image is required";
                                } elseif ($fileSize > 1048576) {
                                    /* max photo size 1mb */
                                    $error['image'] = "Image size less then 1mb required";
                                } else {
                                    if (!in_array($ext, $allowItem)) {
                                        $error['image'] = "Only jpg, jpeg, webp & png allow";
                                    } else {
                                        $data['image'] = $upload_Image;
                                    }
                                }
        
        
                                if (
                                    empty($error['title']) &&
                                    empty($error['slug']) &&
                                    empty($error['description']) &&
                                    empty($error['category']) &&
                                    empty($error['tag']) &&
                                    empty($error['image']) &&
                                    empty($error['status'])
                                ) 
                                {
                                    try {
        
        
                                        $sql = "INSERT INTO posts(category_id, admin_id, title, slug, description, image, status, created_at)VALUES(:category_id, :admin_id, :title, :slug, :description, :image, :status, :created_at)";
        
                                        if ($stmt = $conn->prepare($sql)) {
        
                                            $currentTime = date('Y-m-d H:i:s');
        
                                            $stmt->bindParam(':category_id', $data['category'], PDO::PARAM_INT);
                                            $stmt->bindParam(':admin_id', $_SESSION['admin_id'], PDO::PARAM_INT);
                                            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
                                            $stmt->bindParam(':slug', $data['slug'], PDO::PARAM_STR);
                                            $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
                                            $stmt->bindParam(':image', $upload_Image, PDO::PARAM_STR);
                                            $stmt->bindParam(':status',$status, PDO::PARAM_STR);
                                            $stmt->bindParam(':created_at', $currentTime, PDO::PARAM_STR);
                                            $stmt->execute();
        
                                            $lastId = $conn->lastInsertId();
        
                                            /* insert post tags */
                                            if ($data['tags']) {
                                                foreach ($tags as $key => $tag) {
                                                    $sql = "INSERT INTO post_tag(post_id,tag_id)VALUES(:post_id,:tag_id)";
                                                    if ($stmt = $conn->prepare($sql)) {
                                                        $stmt->bindParam(':post_id', $lastId, PDO::PARAM_INT);
                                                        $stmt->bindParam(':tag_id', $tags[$key], PDO::PARAM_INT);
                                                        $stmt->execute();
                                                    }
                                                }
                                            }
        
                                            if ($lastId) {
        
                                                if ($fileName != null) {
                                                    move_uploaded_file($fileTmp, $upload_Image);
                                                }
                                                $_SESSION['success'] = 'Post insert successfully';
        
                                                echo '<script>window.location.href = "posts.php";</script>';
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        die('Could insert tag' . $sql . $e->getMessage());
                                    }
                                }
                            }
                            ?>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                        enctype="multipart/form-data" class="mt-3">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" value="<?php echo $data['title'] ?? '' ?>"
                                        class="form-control" id="category_name" placeholder="Title" />
                                    <span class="form-text text-danger">
                                        <?php echo  $error['title'] ?? ''; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        value="<?php echo $data['slug'] ?? '' ?>" />
                                    <span class="form-text text-danger">
                                        <?php echo  $error['slug'] ?? ''; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="tag" class="form-label">Tags</label>
                                    <select name="tags[]" id="tags" class="form-select select-tags" multiple>
                                        <?php
                                            $sql = "SELECT * FROM tag";
                                            $stmt = $conn->query($sql);
                                            $tags = $stmt->fetchAll(PDO::FETCH_OBJ);

                                            if ($tags != null) {
                                                foreach ($tags as $key => $tag) { ?>
                                                <option value="<?php echo $tag->id ?>"><?php echo $tag->name ?></option>
                                        <?php
                                                }
                                            }?>
                                    </select>
                                    <span class="form-text text-danger">
                                        <?php echo  $error['tags'] ?? ''; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="summernote" class="form-label">Description</label>
                                    <textarea name="description" class="form-control"
                                        <?php echo $data['description'] ?? '' ?> id="summernote" cols="94"
                                        rows="100"></textarea>
                                        <span class="form-text text-danger">
                                            <?php echo  $error['description'] ?? ''; ?>
                                        </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" data-default-file="<?php echo $data['image'] ?? '' ?>"
                                        name="image" class="form-control dropify" id="image" />
                                    <span class="form-text text-danger">
                                        <?php echo  $error['image'] ?? ''; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-select">
                                        <option disabled selected value="">Select Category </option>
                                        <?php
                                            $sql = "SELECT * FROM category";
                                            $stmt = $conn->query($sql);
                                            $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

                                            if ($categories != null) {
                                                foreach ($categories as $key => $category) { ?>
                                        <option value="<?php echo $category->id ?>"><?php echo $category->name ?>
                                        </option>
                                        <?php
                                            }
                                        }  ?>
                                    </select>
                                    <span class="form-text text-danger">
                                        <?php echo  $error['category'] ?? ''; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="d-block">Post Status</label>
                                    <div class="d-flex align-items-center mt-1">
                                        <div>
                                            <input type="radio" id="published" name="status" value="active"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="published">Published</label>
                                        </div>
                                        <div class="ms-3">
                                            <input type="radio" id="draft" name="status" value="inactive"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="draft">Draft</label>
                                        </div>
                                        <small id="image" class="form-text text-danger">
                                            <?php echo  $error['status'] ?? ''; ?>
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>

                </div>
            </main>

            <?php include("layout/footer.php") ?>

        </div>
    </div>

    <?php include("layout/foot.php") ?>