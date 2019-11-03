<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui grid">
    <div class="fourteen wide column">
        <div class="ui container">
            <div class="ui list">
                <?php foreach($data['posts'] as $post): ?>
                    <div class="item">
                        <div class="ui card">
                            <div class="content">
                                <a class="header"><?php echo $post->title; ?></a>
                                <div class="meta">
                                    <span><?php echo $post->name; ?></span>
                                    <div class="right">
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