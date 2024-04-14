<?php


function printNavbarColor() {
    $namePage = myWitchPageIsIt();

    $language = $_SESSION['l'];
    
    switch ($namePage) {
        case 'index.php':
            if ($language == 'fr') {
                ?>
                    <a class="selected-language" href="index.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a style="margin-left: 5px;" href="index.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            } else if ($language == "en") {
                ?>
                    <a href="index.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a class="selected-language" style="margin-left: 5px;" href="index.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            }           
            ?>
                <a style="margin-left: 25px;" class="selected" href="index.php">Home</a>
                <a href="works.php">Works</a>
                <a href="blog.php">Blog</a>
                <a href="about.php">About</a>
            <?php
            break;
        case 'works.php':
            if ($language == 'fr') {
                ?>
                    <a class="selected-language" href="works.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a style="margin-left: 5px;" href="works.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            } else if ($language == "en") {
                ?>
                    <a href="works.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a class="selected-language" style="margin-left: 5px;" href="works.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            }    
            ?>
                <a style="margin-left: 25px;" href="index.php">Home</a>
                <a class="selected" href="works.php">Works</a>
                <a href="blog.php">Blog</a>
                <a href="about.php">About</a>
            <?php
            break;
        case 'single_work.php':
            if ($language == 'fr') {
                ?>
                    <a class="selected-language" href="?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a style="margin-left: 5px;" href="?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            } else if ($language == "en") {
                ?>
                    <a href="?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a class="selected-language" style="margin-left: 5px;" href="?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            }    
            ?>
                <a style="margin-left: 25px;" href="index.php">Home</a>
                <a href="works.php">Works</a>
                <a href="blog.php">Blog</a>
                <a href="about.php">About</a>
            <?php
            break;
        case 'blog.php':
            if ($language == 'fr') {
                ?>
                    <a class="selected-language" href="blog.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a style="margin-left: 5px;" href="blog.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            } else if ($language == "en") {
                ?>
                    <a href="blog.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a class="selected-language" style="margin-left: 5px;" href="blog.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            }    
            ?>
                <a style="margin-left: 25px;" href="index.php">Home</a>
                <a href="works.php">Works</a>
                <a class="selected" href="blog.php">Blog</a>
                <a href="about.php">About</a>
            <?php
            break;
        case 'about.php':
            if ($language == 'fr') {
                ?>
                    <a class="selected-language" href="about.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a style="margin-left: 5px;" href="about.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            } else if ($language == "en") {
                ?>
                    <a href="about.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a class="selected-language" style="margin-left: 5px;" href="about.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            }    
            ?>
                <a style="margin-left: 25px;" href="index.php">Home</a>
                <a href="works.php">Works</a>
                <a href="blog.php">Blog</a>
                <a class="selected" href="about.php">About</a>
            <?php
            break;
        case 'login.php':
            if ($language == 'fr') {
                ?>
                    <a class="selected-language" href="login.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a style="margin-left: 5px;" href="login.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            } else if ($language == "en") {
                ?>
                    <a href="login.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a class="selected-language" style="margin-left: 5px;" href="login.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            }    
            ?>
                <a style="margin-left: 25px;" href="index.php">Home</a>
                <a href="works.php">Works</a>
                <a href="blog.php">Blog</a>
                <a href="about.php">About</a>
            <?php
            break;
        default:
            if ($language == 'fr') {
                ?>
                    <a class="selected-language" href="index.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a style="margin-left: 5px;" href="index.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            } else if ($language == "en") {
                ?>
                    <a href="index.php?l=fr" onclick="enregistrerPositionDeDefilement()">🇫🇷</a>
                    <a class="selected-language" style="margin-left: 5px;" href="index.php?l=en" onclick="enregistrerPositionDeDefilement()">🇺🇸</a>
                <?php
            }           
                ?>
                    <a style="margin-left: 25px;" href="index.php">Home</a>
                    <a href="works.php">Works</a>
                    <a href="blog.php">Blog</a>
                    <a href="about.php">About</a>
                <?php
            break;
    }
}


// ==================================
//  III  N   N  DDD    EEEEE  X   X
//   I   NN  N  D  D   E       X X
//   I   N N N  D   D  EEE      X
//   I   N  NN  D   D  E       X X
//   I   N   N  D  D   E      X   X
//  III  N   N  DDD    EEEEE  X   X
// ==================================
// * * * index

// Fonction pour récupérer des recents posts 
/*function getRecentPosts() {
global $conn;

$sql = "SELECT * 
FROM posts 
ORDER BY created_at DESC 
LIMIT 2";
$result = mysqli_query($conn, $sql);

if($result) {
$all_recent_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $all_recent_posts;
}
}*/

function getRecentPosts($page) {
    global $conn;
    
    $page   = $_SESSION[$page]['post'];
    $sql    = "SELECT * 
            FROM posts 
            ORDER BY created_at DESC 
            LIMIT 2 OFFSET " . ($page - 1) * 2;
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $all_recent_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all_recent_posts;
    }
}

function getTopicforRecentPosts($recent_post) {
    global $conn;
    
    $id_topic_post = $recent_post['id_topic'];
    $sql           = "SELECT name_topic 
            FROM topic
            WHERE id = '$id_topic_post'";
    $result        = mysqli_query($conn, $sql);
    
    if ($result) {
        $topic = mysqli_fetch_assoc($result);
        return $topic['name_topic'];
    }
}

// Fonction pour les afficher proprement
function printRecentPosts($all_recent_post) {
    foreach ($all_recent_post as $post) {
?>
       <div class="post-item">
            <h3><?php
        echo $post['title'];
?></h3>
            <div class="info">
                <h5><?= $post['user_name'] ?></h5>
                <h5>|</h5>
                <h5><?php
        echo date('F j, Y', strtotime($post['created_at']));
?></h5>
                <h5>|</h5>
                <h5><?= getTopicforRecentPosts($post); ?></h5>
            </div>
            <p><?php
        echo substr($post['content'], 0, 150) . '...';
?></p>
        </div>
    <?php
    }
}

function nbPage($all_posts, $n) {
    if (count($all_posts) % $n == 0) {
        $nbPage = count($all_posts) / $n;
    } else {
        $nbPage = (count($all_posts) / $n) + 1;
    }
    return $nbPage;
}

function printnbPageforRecentPosts($nbPage) {
    $language = $_SESSION['l'];


    ?> - <?php
    for ($i = 1; $i <= $nbPage; $i++) {
        if (isset($_SESSION['home']['post']) && $_SESSION['home']['post'] == $i) {
            ?> <a class="pagination-button" style="color: #303f9f" href="index.php?post=<?= $i ?>" onclick="enregistrerPositionDeDefilement()"><?= $i; ?></a> - <?php
        } else {
            ?> <a class="pagination-button" href="index.php?post=<?= $i ?>" onclick="enregistrerPositionDeDefilement()"><?= $i; ?></a> - <?php
        }
    }
}


// Fonction pour récupérer des featured works
/*function getFeaturedWorks() {
global $conn;

$sql = "SELECT * 
FROM work
ORDER BY created_at DESC 
LIMIT 2";
$result = mysqli_query($conn, $sql);

if($result) {
$all_featured_works = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $all_featured_works;
}
}*/

function getFeaturedWorks($page) {
    global $conn;
    
    $page   = $_SESSION[$page]['work'];
    $sql    = "SELECT * 
    FROM work 
    ORDER BY created_at DESC 
    LIMIT 2 OFFSET " . ($page - 1) * 2;
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $all_recent_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all_recent_posts;
    }
}

function getallFeaturedWorks() {
    global $conn;
    
    $sql    = "SELECT * 
    FROM work
    ORDER BY created_at DESC 
    LIMIT 2";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $all_featured_works = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all_featured_works;
    }
}

function getTopicforFeaturedWorks($feature_work) {
    global $conn;
    
    $id_topic_work = $feature_work['id_topic'];
    $sql           = "SELECT name_topic 
    FROM topic
    WHERE id = '$id_topic_work'";
    $result        = mysqli_query($conn, $sql);
    
    if ($result) {
        $topic = mysqli_fetch_assoc($result);
        return $topic['name_topic'];
    }
}

// Fonction pour les afficher proprement
function printFeaturedWorks($all_featured_works) {
    foreach ($all_featured_works as $work) {
?>
       <a href="single_work.php?name=<?= $work['title'] ?>">
            <div class="item">
                <?php
        $image = './static/images/' . $work['image'];
?>
               <img src="<?= $image ?>">
                <div class="details">
                    <h3><?= $work['title']; ?></h3>
                    <div class="item-info">
                        <div class="year-badge"><?= date('Y', strtotime($work['created_at'])); ?></div>
                        <h4><?= getTopicforFeaturedWorks($work); ?></h4>
                    </div>
                    <p><?= substr($work['content'], 0, 150) . '...'; ?></p>
                </div>
            </div>
        </a>
    <?php
    }
}


function printnbPageforFeaturedWorks($nbPage) {
    $language = $_SESSION['l'];

    ?> - <?php
    for ($i = 1; $i <= $nbPage; $i++) {
        if (isset($_SESSION['home']['work']) && $_SESSION['home']['work'] == $i) {
?>
               <a class="pagination-button" style="color: #303f9f" href="index.php?work=<?= $i ?>" onclick="enregistrerPositionDeDefilement()"><?= $i; ?></a> -
            <?php
        } else {
?>
               <a class="pagination-button" href="index.php?work=<?= $i ?>" onclick="enregistrerPositionDeDefilement()"><?= $i; ?></a> -
            <?php
        }
    }
}


// =============================
//  W   W   OOO   RRRR   K  K
//  W   W  O   O  R   R  K K
//  W   W  O   O  R   R  KK
//  W W W  O   O  RRRR   K K
//  W W W  O   O  R  R   K  K
//   W W    OOO   R   R  K   K
// =============================
// * * * WORK

// Fonction pour récupérer les works
function getWorks() {
    global $conn;
    
    $sql    = "SELECT * 
    FROM work";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $all_works = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all_works;
    }
}

function getnWorks($page, $n) {
    global $conn;
    
    $page   = $_SESSION[$page]['work'];
    $sql    = "SELECT * 
    FROM work 
    ORDER BY created_at DESC 
    LIMIT $n OFFSET " . ($page - 1) * $n;
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $all_recent_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all_recent_posts;
    }
}


function getTopicforWorks($work) {
    global $conn;
    
    $id_topic_work = $work['id_topic'];
    $sql           = "SELECT name_topic
    FROM topic
    WHERE id = '$id_topic_work'";
    $result        = mysqli_query($conn, $sql);
    
    if ($result) {
        $topic = mysqli_fetch_assoc($result);
        return $topic['name_topic'];
    }
}

// Fonction pour les afficher proprement
function printWorks($all_works) {
    foreach ($all_works as $work) {
        ?>
            <a href="single_work.php?name=<?= $work['title'] ?>">
                <div class="item">
                    <?php $image = './static/images/' . $work['image']; ?>
                    <img src="<?= $image ?>">
                    <div class="details">
                        <h3><?= $work['title']; ?></h3>
                        <div class="item-info">
                            <div class="year-badge"><?= date('Y', strtotime($work['created_at'])); ?></div>
                            <h4><?= getTopicforWorks($work); ?></h4>
                        </div>
                        <p><?= $work['content']; ?></p>
                    </div>
                </div>
            </a>
            <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <div class="buttons">
                        <a href="?delete_work=<?= $work['id'] ?>" onclick="return confirmDelete('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                            <i id="delete_work" class='bx bx-trash-alt'></i>
                        </a>
                    </div>
                <?php
                }
            ?>
        <?php
    }
}


function printnbPageforWork($nbPage) {
    $language = $_SESSION['l'];

    ?> - <?php
    for ($i = 1; $i <= $nbPage; $i++) {
        if (isset($_SESSION['work']['work']) && $_SESSION['work']['work'] == $i) {
?>
           <a class="pagination-button" style="color: #303f9f" href="works.php?work="><?= $i; ?></a> -
        <?php
        } else {
?>
           <a class="pagination-button" href="works.php?work=<?= $i ?>"><?= $i; ?></a> -
        <?php
        }
    }
}


// =============================
//  BBB    L       OOO    GGG
//  B  B   L      O   O  G   G
//  BBBB   L      O   O  G
//  B   B  L      O   O  G  GG
//  B   B  L      O   O  G   G
//  BBBB   LLLLL   OOO    GGGG
// =============================
// * * * BLOG

function getPosts() {
    global $conn;
    
    $sql    = "SELECT * 
    FROM posts";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $all_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all_posts;
    }
}

function getnPosts($page, $n) {
    global $conn;
    
    $page   = $_SESSION[$page]['post'];
    $sql    = "SELECT * 
    FROM posts 
    ORDER BY created_at DESC 
    LIMIT $n OFFSET " . ($page - 1) * $n;
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $all_recent_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all_recent_posts;
    }
}

function getTopicforPosts($post) {
    global $conn;
    
    $id_topic_post = $post['id_topic'];
    $sql           = "SELECT name_topic 
    FROM topic
    WHERE id = '$id_topic_post'";
    $result        = mysqli_query($conn, $sql);
    
    if ($result) {
        $topic = mysqli_fetch_assoc($result);
        return $topic['name_topic'];
    }
}


// Fonction pour les afficher proprement
function printPosts($all_post) {
    foreach ($all_post as $post) {
        ?>
            <div class="post-item">
                <h3><?php echo $post['title']; ?></h3>
                <div class="info">
                    <h5><?= $post['user_name'] ?></h5>
                    <h5>|</h5>
                    <h5><?php echo date('F j, Y', strtotime($post['created_at'])); ?></h5>
                    <h5>|</h5>
                    <h5><?= getTopicforPosts($post); ?></h5>
                </div>

                <p><?= $post['content']; ?></p>

            <?php
        if (isset($_SESSION['user'])) {
            ?>
               <div class="buttons">
                    <!-- <i class='bx bx-share'></i>
                    <i class='bx bx-link-alt'></i>
                    <i class='bx bx-copy'></i> -->
                    <a href="?delete_post=<?= $post['id'] ?>" onclick="return confirmDelete('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                        <i id="delete_post" class='bx bx-trash-alt'></i> 
                    </a>
                    <button>Voir le projet</button>
                </div>
            <?php
        } else {
            ?>
               <div class="buttons">
                    <button>Voir le projet</button>
                </div>
            <?php
        }
        ?>
            </div>
        <?php
    }
}

function printnbPageforPost($nbPage) {
    $language = $_SESSION['l'];

?> - <?php
    for ($i = 1; $i <= $nbPage; $i++) {
        if (isset($_SESSION['blog']['post']) && $_SESSION['blog']['post'] == $i) {
?>
           <a class="pagination-button" style="color: #303f9f" href="blog.php?post<?= $i ?>"><?= $i; ?></a> -
        <?php
        } else {
?>
           <a class="pagination-button" href="blog.php?post=<?= $i ?>"><?= $i; ?></a> -
            <?php
        }
    }
}




function printMenuDeroulantCreerPost() {
    global $conn;
    
    $sql = "SELECT *
    FROM topic";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $all_topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $i          = 0;
        
        foreach ($all_topics as $topic) {
            if ($topic['name_topic'] !== 'Avis' && $topic['name_topic'] !== 'Autre') {
?>
               <option value="<?= $topic['id']; ?>"><?php
                echo $topic['name_topic'];
?></option>
                <?php
                $i++;
?>
               <?php
            }
        }
    }
?>
   <option value="1">Avis </option>
    <option value="2">Autre </option>
    <?php
}


function printMenuDeroulantCreerWork() {
    global $conn;
    
    $sql = "SELECT *
    FROM topic";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $all_topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $i          = 0;
        
        foreach ($all_topics as $topic) {
            if ($topic['name_topic'] !== 'Avis' && $topic['name_topic'] !== 'Autre') {
                ?>
                    <option value="<?= $topic['id']; ?>">
                        <?php echo $topic['name_topic']; ?> 
                    </option>
                <?php
                $i++;
            }
        }
        
        ?>
            <option value="1"> Avis </option>
            <option value="autre"> Autre </option>
        <?php
    }
}


// ==========================================================================
//   SSS   III  N   N   GGG   L      EEEEE       W   W   OOO   RRRR   K  K
//  S       I   NN  N  G   G  L      E           W   W  O   O  R   R  K K
//   SSS    I   N N N  G      L      EEE         W   W  O   O  R   R  KK
//      S   I   N  NN  G  GG  L      E           W W W  O   O  RRRR   K K
//      S   I   N   N  G   G  L      E           W W W  O   O  R  R   K  K
//  SSSS   III  N   N   GGGG  LLLLL  EEEEE        W W    OOO   R   R  K   K
// ==========================================================================
// * * * SINGLE WORK

function getLinkGithub($work) {
    global $conn;
    
    $id_work = $work['id'];
    $sql     = "SELECT link_github 
                FROM work
                WHERE id = '$id_work'";

    $result  = mysqli_query($conn, $sql);
    if ($result) {
        $link_github = mysqli_fetch_assoc($result);
        return $link_github['link_github'];
    }
}

function printSingleWork($work) {
?>
   <h1 class="page-title"><?= $work['title'] ?></h1>

    <div class="content">
        <div class="work-info">
            <div class="year-badge">
                <?= date('Y', strtotime($work['created_at'])); ?>
           </div>
            <div class="category">
                <p><?= getTopicforFeaturedWorks($work); ?></p>
            </div>

            <a href="https://github.com/maximebgd">
                <div class="socials">
                    <p style="text-decoration: underline;"> Lien gihub du projet : </p>
                    <a href="<?= getLinkGithub($work); ?>" class='bx bxl-github' style="font-size: 250%;"></a>
                </div>
            </a>

            <div class="socials">
                <p> Copier le git clone : </p>
                <span id="gitclone-text" style="display: none;">git clone <?= getLinkGithub($work); ?></span>
                <span id="copy_button" class='bx bxs-copy' onclick="copyToClipboard()" style="cursor: pointer; font-size: 120%;"></span>
            </div>
        </div>

        <?php
            $image = './static/images/' . $work['image'];
        ?>
       <img src="<?= $image ?>">

        <p>
            <?= $work['content']; ?>
       </p>
    </div>
    <?php
}

function getWorkbyName() {
    global $conn;
    $name = $_SESSION['single_work']['name'];
    
    $sql    = "SELECT * 
            FROM work 
            WHERE title = '$name'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $work = mysqli_fetch_assoc($result);
        return $work;
    }
}