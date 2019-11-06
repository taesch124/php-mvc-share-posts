<?php require APPROOT.'/views/inc/header.php'; ?>



<div class="ui center aligned stackable grid">
    <div class="ui ten wide column">    
        <div class="ui container">    
            <div class="ui left aligned segment">
                <?php flash('register_success') ?>
                <form action="<?php echo URLROOT?>/users/login" method="POST" class="ui form">
                    <div class="two fields">
                        <div class="field <?php echo (!empty($data['errors']['email'])) ? 'error' : ''?>">
                            <label>E-mail:</label>
                            <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']?>"/>
                        </div>
                        <div class="field <?php echo (!empty($data['errors']['password'])) ? 'error' : ''?>">
                            <label>Password:</label>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $data['password']?>"/>
                        </div>
                    </div>

                    <div class="ui container">
                        <button class="ui primary button fluid" type="submit">Login</button>
                        <div class="ui hidden fitted divider"></div>
                        <div class="ui center aligned container">
                            Don't have an account? <a href="<?php echo URLROOT?>users/register">Register</a>
                        </div>
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