<?php

session_start();

//Flash messaging
function flash($name = '', $message = '', $class = 'ui message success') {
    if(!empty($name)) {
        if(!empty($message) && empty($_SESSION[$name])) {

            if(!empty($_SESSION[$name.'_class'])) {
                unset($_SESSION[$name.'_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        } else if (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : $class;
            echo '<div class="'.$class.'" id="msg-flash"><i class="close icon"></i>'.$_SESSION[$name].'</div>';

            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}