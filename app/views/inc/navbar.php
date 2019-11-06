
<div class="ui stackable fixed secondary menu">
    <div class="ui container padded">
        <a href="<?php echo URLROOT ?>" class="item <?php echo $data['title'] == 'SharePosts' ? 'active' : ''; ?>">
            <?php echo SITENAME ?>
        </a>
        <a href="<?php echo URLROOT ?>pages/about" class="item <?php echo $data['title'] == 'About' ? 'active' : ''; ?>">
            About
        </a>
        <?php if(isset($_SESSION['user_id'])): ?>
        <a href="<?php echo URLROOT ?>posts" class="item <?php echo $data['title'] == 'Posts' ? 'active' : ''; ?>">
            Posts
        </a>
        <?php endif; ?>
        <div class="right menu">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT?>users/logout" class="ui item">
                Logout
                </a>
            <?php else: ?>
                <a href="<?php echo URLROOT?>users/register" class="ui item <?php echo $data['title'] == 'Register' ? 'active' : ''; ?>">
                Register
                </a>
                <a href="<?php echo URLROOT?>users/login" class="ui item <?php echo $data['title'] == 'Login' ? 'active' : ''; ?>">
                Login
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>