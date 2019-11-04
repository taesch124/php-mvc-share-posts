<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui two column centered grid">
    <div class="middle aligned three wide column">
        Welcome, <?php echo $_SESSION['user_name'] ?>
    </div>
    <div class="three wide column">
        <a href="#" class="ui primary labeled icon button fluid"><i class="icon pencil"></i>Make new Post</a>
    </div>
</div>

<div class="ui centered grid">
    <div class="ten wide column">
        <div class="ui container">
            <div class="ui list">
                <?php foreach($data['posts'] as $post): ?>
                    <div class="item">
                        <div class="ui card fluid">
                            <div class="content">
                                <a class="header"><?php echo $post->title; ?></a>
                                <div class="meta">
                                    <span><?php echo $post->name; ?></span>
                                    <div class="right floated">
                                        <?php echo $post->created_at; ?>
                                    </div>
                                </div>
                                <div class="description">
                                    <?php echo $post->text; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>