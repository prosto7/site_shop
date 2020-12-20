<?php
session_start();
require_once ("pages/classes.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site 3. Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/jquery_cookie.js"></script>
    <link rel="stylesheet" href="style.css">

</head> 
<body>
<div class="container-fluid" >
    <div class="row">
        <header class="col-12">
        </header>
    </div>

    <div class="row" id="top_menu_head">
        <nav class="ml-5 col-12 navbar justify-content-center nav-fill m-2 "  >
            <?php include_once("pages/menu.php"); ?>
        </nav>
    </div>

    <div class="row">
        <section class="col-12 my-5">
            <?php
            if(isset($_GET['page'])) {
                $page = $_GET['page'];
                if($page === '1') include_once("pages/catalog.php");
                if($page === '2') include_once("pages/cart.php");
                if($page === '3') include_once("pages/registration.php");
                if($page === '4') include_once("pages/admin.php");
            }
            ?>
        </section>
    </div>

    <footer class="row p-2 lead text-info justify-content-center">Step Academy by Roman Khrapov &copy; 2020</footer>
</div>

<script>
    $(document).ready(function(){
      $("#links_menu a").each(function() {
        if ('http://localhost/site3_gr5-master/'+$(this).attr('href') == window.location.href)  {
    $(this).addClass("active");
    }
  }); });
 
 </script>
</body>
</html>
