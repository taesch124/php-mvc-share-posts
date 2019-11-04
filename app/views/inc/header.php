<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/semantic/dist/semantic.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css">

    <script src="<?php echo URLROOT ?>/js/jquery/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/css/semantic/dist/components/transition.min.js"></script>

    <title><?php echo SITENAME ?></title>
</head>
<body>

<?php require APPROOT.'/views/inc/navbar.php'; ?>

<div class="ui segment">
    <div class="ui center aligned padded grid">
        <div class="sixteen wide column">
            <div class="ui masthead">
                <h2 class="ui header">
                    <i class="icon paper plane"></i>
                    <?php echo $data['title']; ?>
                </h2>
            </div>
        </div>
    </div>
    
