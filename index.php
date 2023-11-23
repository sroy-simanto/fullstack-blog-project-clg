<?php 
    include("layout/head.php");
?>

<body>

    <!--  
        #Preloader
    -->
    <div id="pre-loader"></div>

    <?php 
        include("layout/header.php");
    ?>

    <!-- 
        #hero-section
    -->
    <section class="hero-section">
        <div class="container">

            <div class="page-title">
                <h1 class="title">
                    <span>Inside and advice</span> <br> from our expert team
                </h1>
                <p class="text-muted">Find out how the best marketing automation tips and tricks work.</p>
            </div>

            <div class="hero-slider">
                <div class="slides">

                    <?php
                    $sql = "SELECT posts.*,category.name as CategoryName,admin.name as Author FROM posts 
                    INNER JOIN category ON posts.category_id=category.id
                    INNER JOIN admin ON posts.admin_id= admin.id      
                    WHERE posts.status='active'                       
                    ORDER BY posts.id DESC LIMIT 5";
                    $stmp = $conn->query($sql);
                    $stmp->execute();
                    $posts = $stmp->fetchAll(PDO::FETCH_OBJ);
                    if ($posts != null) {
                    foreach ($posts as $post) { ?>

                    <div class="slide">
                        <div class="slide-content">

                            <div class="slide-card">

                                <div class="slide-card-img">
                                    <img src="admin/<?php echo $post-> image ?>" height="300px" alt="slide-img">
                                </div>

                                <div class="slide-card-info">
                                    <span class="tag"><?php echo $post->CategoryName ?></span>
                                    <span class="dot"></span>
                                    <span class="time"><?php echo $post->created_at ?></span>
                                </div>

                                <div class="slide-card-title">
                                    <h1><?php echo $post->title ?></h4>
                                    </h1>
                                </div>

                                <a href="post-details.php?slug=<?php echo $post->slug ?>" class="card-btn"></a>

                            </div>

                        </div>
                    </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </div>

        </div>
    </section>


    <!-- 
        #main
    -->
    <main main-content class="container">

        <article page-content>

            <section class="blog-categories">

                <div class="category-header">
                    <h1 class="title">Technology</h1>
                    <button class="btn primary-btn">
                        <span>View all</span>
                        <span class="material-symbols-outlined icon-btn">chevron_right</span>
                        <a href="#" class="card-btn"></a>
                    </button>
                </div>

                <div class="category-body">

                    <div class="category-slider">
                        <div class="slides">

                            <?php
                            $sql = "SELECT posts.*,category.name as CategoryName,admin.name as Author FROM posts 
                            INNER JOIN category ON posts.category_id=category.id
                            INNER JOIN admin ON posts.admin_id= admin.id      
                            WHERE posts.status='active'                       
                            ORDER BY posts.id DESC LIMIT 6";
                            $stmp = $conn->query($sql);
                            $stmp->execute();
                            $posts = $stmp->fetchAll(PDO::FETCH_OBJ);
                            if ($posts != null) {
                            foreach ($posts as $post) { ?>

                            <div class="slide">
                                <div class="slide-content">

                                    <div class="slide-card">

                                        <div class="slide-card-img">
                                            <img src="admin/<?php echo $post-> image ?>" height="300px" alt="slide-img">
                                        </div>

                                        <div class="slide-card-info">
                                            <span class="tag"><?php echo $post->CategoryName ?></span>
                                            <span class="dot"></span>
                                            <span class="time"><?php echo $post->created_at ?></span>
                                        </div>

                                        <div class="slide-card-title">
                                            <h1><?php echo $post->title ?></h4>
                                            </h1>
                                        </div>

                                        <a href="post-details.php?slug=<?php echo $post->slug ?>" class="card-btn"></a>

                                    </div>

                                </div>
                            </div>

                            <?php
                            }
                        }
                    ?>
                        </div>
                    </div>

                </div>

            </section>

            <section class="blog-categories">

                <div class="category-header">
                    <h1 class="title">Marketing</h1>
                    <button class="btn primary-btn">
                        <span>View all</span>
                        <span class="material-symbols-outlined icon-btn">chevron_right</span>
                        <a href="#" class="card-btn"></a>
                    </button>
                </div>

                <div class="category-body">

                    <div class="category-slider">
                        <div class="slides">

                            <?php
                    $sql = "SELECT posts.*,category.name as CategoryName,admin.name as Author FROM posts 
                    INNER JOIN category ON posts.category_id=category.id
                    INNER JOIN admin ON posts.admin_id= admin.id      
                    WHERE posts.status='active'                       
                    ORDER BY posts.id DESC LIMIT 6";
                    $stmp = $conn->query($sql);
                    $stmp->execute();
                    $posts = $stmp->fetchAll(PDO::FETCH_OBJ);
                    if ($posts != null) {
                    foreach ($posts as $post) { ?>

                            <div class="slide">
                                <div class="slide-content">

                                    <div class="slide-card">

                                        <div class="slide-card-img">
                                            <img src="admin/<?php echo $post-> image ?>" height="300px" alt="slide-img">
                                        </div>

                                        <div class="slide-card-info">
                                            <span class="tag"><?php echo $post->CategoryName ?></span>
                                            <span class="dot"></span>
                                            <span class="time"><?php echo $post->created_at ?></span>
                                        </div>

                                        <div class="slide-card-title">
                                            <h1><?php echo $post->title ?></h4>
                                            </h1>
                                        </div>

                                        <a href="post-details.php?slug=<?php echo $post->slug ?>" class="card-btn"></a>

                                    </div>

                                </div>
                            </div>

                            <?php
                            }
                        }
                    ?>

                        </div>
                    </div>

                </div>

            </section>

        </article>

    </main>

    <!--  
        #Tabs
    -->
    <section class="tabs">
        <div class="container">

            <div class="tab-content">

                <div class="tab-header">
                    <ul>
                        <li>
                            <a href="#" class="active" id="all">All</a>
                        </li>
                        <li>
                            <a href="#" id="marketing">Marketing</a>
                        </li>
                        <li>
                            <a href="#" id="news">News</a>
                        </li>
                        <li>
                            <a href="#" id="technology">Technology</a>
                        </li>
                        <li>
                            <a href="#" id="politics">Politics</a>
                        </li>
                        <li>
                            <a href="#" id="business">Business</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-body">

                    <?php
                    $sql = "SELECT posts.*,category.name as CategoryName,admin.name as Author FROM posts 
                    INNER JOIN category ON posts.category_id=category.id
                    INNER JOIN admin ON posts.admin_id= admin.id      
                    WHERE posts.status='active'                       
                    ORDER BY posts.id DESC LIMIT 6";
                    $stmp = $conn->query($sql);
                    $stmp->execute();
                    $posts = $stmp->fetchAll(PDO::FETCH_OBJ);
                    if ($posts != null) {
                    foreach ($posts as $post) { ?>


                    <div class="card">

                        <div class="slide-card-img">
                            <img src="admin/<?php echo $post-> image ?>" height="300px" alt="slide-img">
                        </div>

                        <div class="slide-card-info">
                            <span class="tag"><?php echo $post->CategoryName ?></span>
                            <span class="dot"></span>
                            <span class="time"><?php echo $post->created_at ?></span>
                        </div>

                        <div class="slide-card-title">
                            <h1><?php echo $post->title ?></h4>
                            </h1>
                        </div>

                        <a href="post-details.php?slug=<?php echo $post->slug ?>" class="card-btn"></a>

                    </div>


                    <?php
                            }
                        }
                    ?>

                </div>

            </div>

        </div>
    </section>


    <?php 
    include("layout/foot.php");
?>