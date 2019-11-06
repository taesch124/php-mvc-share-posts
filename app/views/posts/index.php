<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui two column centered grid">
    <div class="middle aligned three wide column">
        <h4>Welcome, <?php echo $_SESSION['user_name'] ?></h4>
    </div>
    <div class="three wide column">
        <a href="<?php echo URLROOT; ?>posts/add" class="ui primary labeled icon button fluid"><i class="icon pencil"></i>Make new Post</a>
    </div>
</div>



<div class="ui centered grid">
    <div class="ten wide column">
        <div class="ui container">
        <?php flash('post_created'); ?>
            <div class="ui list">
                <?php foreach($data['posts'] as $post): ?>
                    <div class="item">
                        <div class="ui card fluid">
                            <div class="content">
                                <a class="header"><?php echo $post->title; ?></a>
                                <div class="meta">
                                    <span><?php echo $post->name.' @ '.$post->created_at; ?></span>
                                </div>
                                <div class="list-body description">
                                    <?php echo $post->text; ?>
                                </div>
                                <div class="ui hidden fitted divider"></div>
                                <div class="meta">
                                    <a class="ui mini button basic blue" href="<?php echo URLROOT; ?>posts/detail/<?php echo $post->post_id; ?>" >
                                        More...
                                    </a>
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