<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui centered grid">
    <div class="ten wide column">
        <div class="ui container">
        <?php flash('post_created'); ?>
            <div class="ui list">
                <div class="item">
                    <div class="ui card fluid">
                        <div class="content">                            
                            <div class="ui hidden divider"></div>
                            <div class="ui grid stackable">
                                <div class="meta eight wide column">
                                    <a class="ui mini button basic left icon" href="<?php echo URLROOT; ?>posts" >
                                        <i class="left arrow icon"></i>
                                        Back
                                    </a>
                                </div>
                                <div class="meta eight wide column right aligned">
                                    <?php if($_SESSION['user_id'] == (string)$data['post']['user_id']): ?>
                                        <a title= "Edit post" href="<?php echo URLROOT; ?>posts/edit/<?php echo $data['post']['post_id'] ?>" class="ui icon floated right">
                                            <i class="icon pencil"></i>
                                        </a>
                                        <a title="Delete post" href="<?php echo URLROOT; ?>posts/delete/<?php echo $data['post']['post_id'] ?>" class="ui icon floated right">
                                            <i class="icon delete"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div id ="post-header" class="sixteen wide column">
                                    <a class="header"><?php echo $data['post']['title']; ?></a>
                                </div>
                                <div id="post-meta" class="meta eight wide column">
                                    <span><?php echo $data['post']['name'].' @ '.$data['post']['created_at']; ?></span>
                                </div>
                                <?php if($data['post']['edited'] > 0): ?>
                                <div class="meta eight wide column right aligned">
                                    <span>Edited <?php echo $data['post']['edited']; ?> time(s)</span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="sixteen wide column">
                                <div class="description">
                                    <?php echo $data['post']['body']; ?>
                                </div>
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