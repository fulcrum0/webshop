<?php

@include_once(__DIR__ . '/../src/Helpers/Auth.php');
@include_once(__DIR__ . '/../src/Helpers/cart_stats.php');

?>
<!DOCTYPE html>
<html lang="nl">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>LV Bookstore</title>

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
   <link rel="icon" href="img/book.png">
   <link rel="manifest" href="img/site.webmanifest">
   <link rel="stylesheet" href="css/uikit.min.css">
   <link rel="stylesheet" href="css/style.css?v=1.0.1">

</head>

<body>
   <nav class="uk-navbar-container">
      <div class="uk-container">
         <div uk-navbar>

            <div class="uk-navbar-left">
               <ul class="uk-navbar-nav">
                  <li>
                     <a href="index.php">
                        <img class="logo" src="img/book.png" alt="Book" title="Book" />
                        LV Bookstore
                     </a>
                  </li>
               </ul>
            </div>

            <div class="uk-navbar-right">

               <ul class="uk-navbar-nav">
                  <li class="uk-active"><a href="index.php"><img src="img/home.svg">Home</a></li>
                  <?php if (guest()) : ?>
                     <li><a href="login.php"><img src="img/log in.svg">Login</a></li>
                     <li><a href="register.php"><img src="img/register.svg">Register</a></li>
                  <?php endif; ?>
                  <?php if (isLoggedIn()) : ?>
                     <li>
                        <a href="cart.php">
                           <span uk-icon="icon: cart"></span>
                           Cart
                           <span id="cart_amount_indicator" class="uk-badge"><?= countItemsInCart() ?></span>
                        </a>
                     </li>
                     <li>
                        <a href="#"><span uk-icon="icon: user"></span>Welcome <?= user()->firstname ?> <span uk-navbar-parent-icon></span></a>
                        <div class="uk-navbar-dropdown">
                           <ul class="uk-nav uk-navbar-dropdown-nav">
                              <li class="uk-nav-header">Your Information</li>
                              <li><a href="profile.php"><span uk-icon="icon: settings"></span>Profile</a></li>
                              <li><a href="orderlist.php"><span uk-icon="icon: bag"></span>Orders</a></li>
                              <li><a href="invoicelist.php"><span uk-icon="icon: credit-card"></span>Invoices</a></li>
                              <li><a href="returnlist.php"><span uk-icon="icon: refresh"></span>Return</a></li>
                              <li><a href="favorites.php"><span uk-icon="icon: heart"></span>Wishlist</a></li>
                              <li class="uk-nav-header">Contact</li>
                              <li><a href="customerservice.php"><span uk-icon="icon: info"></span>Customer Service</a></li>
                              <li class="uk-nav-divider"></li>
                              <li>
                                 <form method="POST" action="logout.php" id="logout-form" style="display: none;">
                                    <input type="hidden" name="user_id" value="<?= user_id() ?>" />
                                 </form>
                                 <a href="javascript:void" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span uk-icon="icon: sign-out"></span>Log out
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                  <?php endif; ?>
               </ul>

            </div>
         </div>
      </div>
   </nav>

   <main class="uk-container uk-padding">