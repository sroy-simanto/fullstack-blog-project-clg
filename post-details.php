<?php 
    include("layout/head.php");
?>

<body>
    
    <!--  
        #Preloader
    -->
    <div id="pre-loader"></div>

    <!-- 
        #Header
    -->

    <?php 
        include("layout/header.php");
    ?>

    <!--  
        #Main
    -->
    <main class="container content-detail">

        <article page-content>

        <?php 
            if (isset($_GET['slug']) && !empty($_GET['slug'])) {
                $slug = trim($_GET['slug']);
                $sql = "SELECT posts.*,category.name as CategoryName,admin.name as Author FROM posts 
                INNER JOIN category ON posts.category_id=category.id
                INNER JOIN admin ON posts.admin_id= admin.id                            
                WHERE posts.slug=:postSlug";
                $stmp = $conn->prepare($sql);
                $stmp->bindParam(':postSlug', $slug, PDO::PARAM_STR);
                $stmp->execute();
                $post = $stmp->fetch(PDO::FETCH_OBJ);                          
            }                         
        ?>
            
            <section class="post-detail">
                <div class="post-content">

                    <div class="content-breadcump">
                        <span class="material-symbols-outlined icon">home</span>
                        <span class="material-symbols-outlined icon">chevron_right</span>
                        <span class="title title-blog">Blog</span>
                        <span class="material-symbols-outlined icon">chevron_right</span>
                        <h1 class="title post-title"><?php echo $post->title ?></h1>
                    </div>

                    <div class="content-title">
                        <h1><?php echo $post->title ?></h1>
                        <p class="text-muted"><?php echo $post->title ?></p>
                    </div>

                    <div class="content-tags-date">
                        <span class="tag"><?php echo $post->CategoryName ?></span>
                        <span class="dot"></span>
                        <span class="time"><?php $dateCreate = date_create($post->created_at);
                              echo $dateCreate->format('M d, Y'); ?></span>
                    </div>

                    <div class="content-details">
                        <div class="thumbnail">
                            <img src="admin/<?php echo $post->image ?>" alt="post-image">
                        </div>
                        <div class="description">
                            <p><?php echo html_entity_decode($post->description) ?></p>
                        </div>
                    </div>

                </div>
            </section>

        </article>

    </main>


    <!--  
        #Footer
    -->

    <?php 
        include("layout/foot.php");
    ?>