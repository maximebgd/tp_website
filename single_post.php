<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php 
    include('includes/all_functions.php'); 
    $post = getPost($_GET['post-slug']);
?>
    
<title> <?php echo $post['title'] ?> | MyWebSite</title>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
        <!-- // Navbar -->
        <div class="content">
            <!-- Page wrapper -->
            <div class="post-wrapper">
                <!-- full post div -->
                <div class="full-post-div">
                    <!-- On affiche le titre du post -->
                    <h2 class="post-title">
                        <span style="text-decoration: underline"> Titre :</span>
                        <?= getPost($_GET['post-slug'])['title']; ?>     
                    <h2>
                    <!-- On affiche le contenu du post modif : div -> h3 -->
                    <h3 class="post-body-div">
                        <?= getPost($_GET['post-slug'])['body']; ?>
                    </h3>
                </div>
                <!-- // full post div -->
            </div>
            <!-- // Page wrapper -->
            <!-- post sidebar -->
            <div class="post-sidebar">
                <div class="card">
                    <div class="card-header">
                        <h2>Topics</h2>
                    </div>
                    <div class="card-content">
                        <!-- On affiche les topics un par un -->
                        <?php 
                            $all_topic = getAllTopics();
                            $this_topic = getPostTopic($post);
                            foreach ($all_topic as $topic) {
                                if($topic['name'] == $this_topic['name']) { // On met le topic du post en rouge
                                    echo "<a href='filtered_posts.php?topic={$topic['name']}' style='color:red;'>" . $topic['name'] . "</a>"; 
                                }
                                else {
                                    echo "<a href='filtered_posts.php?topic={$topic['name']}'>" . $topic['name'] . "</a>"; 
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- // post sidebar -->
        </div>
    </div>
    <!-- // content -->

    <!-- Footer -->
    <?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
    <!-- // Footer -->
</body>