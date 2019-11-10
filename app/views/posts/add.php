<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui center aligned stackable grid">
    <div class="ui ten wide column">
        <div class="ui container">
            <div class="ui left aligned segment">
                <div class="ui icon">
                    <a href="<?php echo URLROOT; ?>posts">
                        <i class="left arrow icon"></i>
                        Back
                    </a>
                </div>
                <div class="ui hidden divider"></div>
                <?php flash('post_created'); ?>
                <form action="<?php echo URLROOT?>posts/add" method="POST" class="ui form">
                    <div class="field <?php echo (!empty($data['errors']['title'])) ? 'error' : ''?>">
                        <label>Title:</label>
                        <input type="text" name="title" placeholder="" value="<?php echo $data['post']['title']?>"/>
                    </div>

                    <div class="field <?php echo (!empty($data['errors']['body'])) ? 'error' : ''?>">
                        <label>Body:</label>
                        <textarea name="body" placeholder="" value="<?php echo $data['post']['body']?>"></textarea>
                    </div>

                    <div class="ui container">
                        <button class="ui primary button fluid" type="submit">Post</button>
                    </div>

                    <div class="ui error message" style="display: <?php echo empty($data['errors']) ? 'none' : 'block' ?>">
                        <ul>
                            <?php foreach($data['errors'] as $field => $error): ?>
                            <li><?php echo ucwords($field).': '.$error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>