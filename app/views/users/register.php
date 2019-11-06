<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui center aligned stackable grid">
    <div class="ui ten wide column">
        <div class="ui container">
            <div class="ui center aligned segment">
                <h3>Create an Account</h3>
                <p>Please register to start posting</p>
            </div>
            <form action="<?php echo URLROOT?>/users/register" method="POST" class="ui form">
                <div class="ui left aligned segment">
                    <div class="two fields">
                        <div class="required field <?php echo (!empty($data['name_error'])) ? 'error' : ''?>">
                            <label class="left aligned content">Name:</label>
                            <input type="text" name="name" placeholder="Name" value="<?php echo $data['name']?>"/>
                        </div>
                        <div class="required field <?php echo (!empty($data['email_error'])) ? 'error' : ''?>">
                            <label>E-mail:</label>
                            <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']?>"/>
                        </div>
                    </div>

                    <div class="two fields">
                        <div class="required field <?php echo (!empty($data['password_error'])) ? 'error' : ''?>">
                            <label>Password:</label>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $data['password']?>"/>
                        </div>
                        <div class="required field <?php echo (!empty($data['password_confirm_error'])) ? 'error' : ''?>">
                            <label>Confirm Password:</label>
                            <input type="password" name="password_confirm" placeholder="Confirm Password" value="<?php echo $data['password_confirm']?>"/>
                        </div>
                    </div>

                    <div class="ui container">
                        <button class="ui button primary fluid" type="submit">Register</button>
                        <div class="ui hidden fitted divider"></div>
                        <div class="ui center aligned container">
                            Already have an account? <a href="<?php echo URLROOT?>users/login">Login</a>
                        </div>
                    </div>

                    <div class="ui error message" style="display: <?php echo empty($data['errors']) ? 'none' : 'block' ?>">
                        <ul class="list">
                            <?php foreach($data['errors'] as $field => $error): ?>
                            <li><?php echo ucwords($field).': '.$error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>