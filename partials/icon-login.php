<?php 
$user_car_register = get_option('users_can_register');
if ( $user_car_register ) : 
    $user_icon_link = '/wp-login.php';
    if ( is_user_logged_in() ) $user_icon_link = '/my-account/';
    ?>
    <a class="icon-login icon-header" href="<?php echo $user_icon_link; ?>" title="">
        <ion-icon name="person-outline"></ion-icon>
    </a>
<?php endif; ?>