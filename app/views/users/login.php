<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="ui stackable grid">
    <div class="ui container">
        <div class="twelve wide column">
            <div class="ui segment">
                <form action="<?php echo URLROOT?>/users/login" method="POST" class="ui form">
                    <div class="two fields">
                        <div class="field <?php echo (!empty($data['email_error'])) ? 'error' : ''?>">
                            <label>E-mail:</label>
                            <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']?>"/>
                        </div>
                        <div class="field <?php echo (!empty($data['password_error'])) ? 'error' : ''?>">
                            <label>Password:</label>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $data['password']?>"/>
                        </div>
                    </div>

                    <div class="ui container">
                        <button class="ui primary button fluid" type="submit">Login</button>
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