<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
    require APP_ROOT . '/views/inc/header.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/nav.php';
    ?>

    <main class="index">
        <!-- First Posts  -->
        <div class="container">
            <div class="row first-posts">
                <!-- Hot news (Big Post) -->
                <div class="col-sm-7">
                    <!-- Set Article Image -->
                    <div class="big-post" style="background-image: url('<?= URL_ROOT ?>/img/img_site/feature-top.jpg');">
                        <div class="big-post-content">
                            <!-- Article Recommendation -->
                            <div class="big-post-recommendation">
                                HOT NEWS
                            </div>
                            <!-- Article Content -->
                            <div class="big-post-text">
                                <h1><?= $data['posts'][0]->title ?></h1>
                                <p><?= $data['posts'][0]->name_author . ", " . date('M d, Y', strtotime($data['posts'][0]->created_at)) ?></p>
                                <p><?= (strlen($data['posts'][0]->content) > 100) ? substr($data['posts'][0]->content, 0, 100) . '...' : $data['posts'][0]->content ?></p>
                            </div>
                            <!-- Article Share Button & Comment Button -->
                            <div class="big-post-extras">
                                <p><i class="fas fa-share-alt"></i> <span><?= $data['posts'][0]->shares ?></span> Shares</p>
                                <p><i class="fas fa-comments"></i> <span><?= $data['posts'][0]->comments ?></span> Comments</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top viewed (Medium Posts) -->
                <div class="col-sm-5">
                    <div class="container">
                        <div class="row">
                            <!-- First Medium Article -->
                            <div class="col-sm-12">
                                <!-- Set Article Image -->
                                <div class="medium-post" style="background-image: url('<?= URL_ROOT ?>/img/img_site/feature-static1.jpg');">
                                    <div class="medium-post-content">
                                        <!-- Article Recommendation -->
                                        <div class="medium-post-recommendation medium-post-recommendation-1">
                                            TOP VIEWED
                                        </div>
                                        <!-- Article Content -->
                                        <div class="medium-post-text">
                                            <h1><?= $data['posts'][1]->title ?></h1>
                                            <p><?= $data['posts'][1]->name_author . ", " . date('M d, Y', strtotime($data['posts'][1]->created_at)) ?></p>
                                            <p><?= (strlen($data['posts'][1]->content) > 100) ? substr($data['posts'][1]->content, 0, 100) . '...' : $data['posts'][1]->content ?></p>
                                        </div>
                                        <!-- Article Share Button & Comment Button -->
                                        <div class="medium-post-extras">
                                            <p><i class="fas fa-share-alt"></i> <span><?= $data['posts'][1]->shares ?></span> Shares</p>
                                            <p><i class="fas fa-comments"></i> <span><?= $data['posts'][1]->comments ?></span> Shares</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Second Medium Article -->
                            <div class="col-sm-12">
                                <!-- Set Article Image -->
                                <div class="medium-post" style="background-image: url('<?= URL_ROOT ?>/img/img_site/feature-static2.jpg');">
                                    <div class="medium-post-content">
                                        <!-- Article Recommendation -->
                                        <div class="medium-post-recommendation medium-post-recommendation-2">
                                            TOP VIEWED
                                        </div>
                                        <!-- Article Content -->
                                        <div class="medium-post-text">
                                            <h1><?= $data['posts'][2]->title ?></h1>
                                            <p><?= $data['posts'][2]->name_author . ", " . date('M d, Y', strtotime($data['posts'][2]->created_at)) ?></p>
                                            <p><?= (strlen($data['posts'][2]->content) > 100) ? substr($data['posts'][2]->content, 0, 100) . '...' : $data['posts'][2]->content ?></p>
                                        </div>
                                        <!-- Article Share Button & Comment Button -->
                                        <div class="medium-post-extras">
                                            <p><i class="fas fa-share-alt"></i> <span><?= $data['posts'][2]->shares ?></span> Shares</p>
                                            <p><i class="fas fa-comments"></i> <span><?= $data['posts'][2]->comments ?></span> Shares</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div>
                        <h1>Mobile</h1>
                        <div class=".bar"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="categories">
                        <h1>Popular News</h1>
                        <div class=".bar"></div>
                    </div>

                    <div class="post">
                        <div class="post-image">
                            <img src="">
                        </div>
                        <div class="post-content">
                            <div class="post-content-text">
                                <h1>Canon launches photo centric 00214 Model supper shutter camera</h1>
                                <p><span>10Aug-2015</span>, by: <span>Eric Joan</span></p>
                            </div>
                            <!-- Article Share Button & Comment Button -->
                            <div class="post-content-extras">
                                <p><i class="fas fa-share-alt"></i> <span>424</span> Shares</p>
                                <p><i class="fas fa-comments"></i> <span>424</span> Shares</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>