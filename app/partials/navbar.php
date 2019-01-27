<?php 
  $section = null;

  if(isset($_GET["section"])) {
    $value = htmlspecialchars($_GET["section"]);    
    
    if($value == "catalog") {
      $section = "catalog";
    } elseif($value == "cart") {
      $section = "cart";
    } elseif($value == "login") {
      $section = "login";
    } elseif($value == "register") {
      $section = "register";
    }
  }
  
?>
<header id="header" class="w-100">
  <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand title" href="/bernette-gaerlan/dream_art/app/views/"><img src="../assets/images/dream-art.PNG" class="img-fluid brand-logo">Dream Art</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarCollapse">
      <ul class="navbar-nav mr-auto ml-4">
        <?php if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && ($_SESSION['user']['role_id'] == 2))){ ?>
        <li class="nav-item">
          <a class="nav-link navi <?php if($section == "catalog") { echo "active"; } ?>" href="/bernette-gaerlan/dream_art/app/views/catalog.php?section=catalog"><i class="fas fa-book"></i> Shop</a>
        </li>


        <li class="nav-item">
          <a class="nav-link <?php if($section == "cart") { echo "active"; } ?> navi" href="/bernette-gaerlan/dream_art/app/views/cart.php?section=cart"><i class="fas fa-shopping-cart"></i> Cart
            <sup><span id="cart-count" class="badge badge-light small">
              <?php if(isset($_SESSION["cart"])){
                echo array_sum($_SESSION["cart"]);
                }else{
                  echo 0;
                }
              ?>
            </span></sup></a>
        </li>
        <?php } ?>

        <?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1){?>
        <li class="nav-item">
          <a href="items.php" class="nav-link navi">Item Admin</a>
        </li>
        <li class="nav-item">
          <a href="users.php" class="nav-link navi">User Admin</a>
        </li>
        <li class="nav-item">
          <a href="orders.php" class="nav-link navi">Orders Admin</a>
        </li>
        <?php } ?>
        

        <?php if(!isset($_SESSION["user"])): ?>
        <!-- <li class="nav-item">
          <a class="nav-link <?php if($section == "login") { echo "active"; } ?>" href="login.php?section=login"><i class="fas fa-user"></i> Login</a>
        </li> -->

        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle <?php if($section == "login") { echo "active"; } ?> navi" data-toggle="dropdown"
                 href="#" role="button" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-user"></i>Guest</a>
              <div class="dropdown-menu bg-light">
                <a class="nav-link <?php if($section == "login") { echo "active"; } ?> dropdown-item navi" href="login.php?section=login"><i class="fas fa-user"></i> Login</a>
              
               <a class="nav-link <?php if($section == "register") { echo "active"; } ?> dropdown-item navi" href="/bernette-gaerlan/dream_art/app/views/register.php?section=register"><i class="fas fa-user"></i> Register </a>
              </div>
           </li>

       <!--  <li class="nav-item">
          <a class="nav-link <?php if($section == "register") { echo "active"; } ?>" href="/bernette-gaerlan/dream_art/app/views/register.php?section=register"><i class="fas fa-user"></i> Register </a>
        </li> -->

      <?php else:  ?>
        <li class="nav-item">
          <a class="nav-link navi" href="/bernette-gaerlan/dream_art/app/views/profile.php">Welcome, <?php echo $_SESSION["user"]["username"]; ?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="logout" href="/bernette-gaerlan/dream_art/app/controllers/logout.php">Logout</a>
        </li>

      <?php endif;?>
      </ul>
      <!-- <form class="search-form form-inline mt-2 mt-md-0 d-none d-md-block justify-content-end">
        <input class="form-control mr-sm-2" type="text" placeholder="Search..." aria-label="Search"><i class="fas fa-search"></i>
      </form> -->
    </div>
  </nav>
</header>