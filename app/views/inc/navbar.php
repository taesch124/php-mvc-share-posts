
<div class="ui secondary pointing menu">
    <div class="ui container padded">
        <a href="<?php echo URLROOT ?>" class="item">
            <?php echo SITENAME ?>
        </a>
        <a href="<?php echo URLROOT ?>/pages/about" class="item">
            About
        </a>
        <a class="item">
            Posts
        </a>
        <div class="right menu">
            <?php if(isset($data['user'])): ?>
                <a class="ui item">
                Logout
                </a>
            <?php else: ?>
                <a href="<?php echo URLROOT?>/users/register" class="ui item">
                Register
                </a>
                <a href="<?php echo URLROOT?>/users/login" class="ui item">
                Login
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>