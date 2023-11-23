<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu mt-3">
            <div class="nav">
                <a class="nav-link ms-2 <?php echo isset($title) && $title =='dashboard'?'active':''?>" href="dashboard.php">
                    Dashboard
                </a>
                <a class="nav-link ms-2 <?php echo isset($title) && $title =='categories'?'active':''?>" href="categories.php">
                    Category
                </a>
                <a class="nav-link ms-2 <?php echo isset($title) && $title =='posts'?'active':''?>" href="posts.php">
                    Posts
                </a>
                <a class="nav-link ms-2 <?php echo isset($title) && $title =='tags'?'active':''?>" href="tags.php">
                    Tags
                </a>
            </div>
        </div>
    </nav>
</div>