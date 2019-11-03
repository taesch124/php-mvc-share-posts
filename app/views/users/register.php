<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui stackable grid">
    <div class="ui container">
        <div class="twelve wide column">
            <div class="ui center aligned segment">
                <h3>Create an Account</h3>
                <p>Please register to start posting</p>
            </div>
            <div class="ui segment">
                <form action="<?php echo URLROOT?>/users/register" method="POST" class="ui form">
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
                        <a class="ui button secondary fluid" type="link" href="<?php echo URLROOT?>/users/login">Login</a>
                    </div>

                    <div class="ui error message">
                        <ul>
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error['field'].': '.$error['message'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>