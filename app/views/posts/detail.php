<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui centered grid">
    <div class="ten wide column">
        <div class="ui container">
        <?php flash('post_created'); ?>
            <div class="ui list">
                <div class="item">
                    <div class="ui card fluid">
                        <div class="content">
                            <div class="meta">
                                <div class="ui grid">
                                    <div class="eight wide column">
                                        <a class="ui mini button basic left icon" href="<?php echo URLROOT; ?>posts" >
                                            <i class="left arrow icon"></i>
                                            Back
                                        </a>
                                    </div>
                                    <div class="right aligned eight wide column">
                                        <?php if($_SESSION['user_id'] == (string)$data['post']['user_id']): ?>
                                            <a href="<?php echo URLROOT; ?>posts/edit/<?php echo $data['post']['post_id'] ?>" class="ui icon floated right">
                                                <i class="icon pencil"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ui hidden divider"></div>
                            <a class="header"><?php echo $data['post']['title']; ?></a>
                            <div class="meta">
                                <span><?php echo $data['post']['name'].' @ '.$data['post']['created_at']; ?></span>
                            </div>
                            <div class="description">
                                <?php echo $data['post']['body']; ?>
                            </div>
                            <div class="ui hidden fitted divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>