<?php
	session_start(); 

   if (!isset($_SESSION['username'])) {
   	$_SESSION['msg'] = "You must log in first";
   	header('location: login.php');
   }
   
   if (isset($_GET['logout'])) {
   	session_destroy();
   	unset($_SESSION['username']);
   	header("location: login.php");
   }
   
   
   include('db.php');
   $status="";
   if (isset($_POST['code']) && $_POST['code']!=""){
   $code = $_POST['code'];
   $result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
   $row = mysqli_fetch_assoc($result);
   $name = $row['name'];
   $code = $row['code'];
   $price = $row['price'];
   $image = $row['image'];
   
   
   
   
   $cartArray = array(
   $code=>array(
   'name'=>$name,
   'code'=>$code,
   'price'=>$price,
   'quantity'=>1,
   'image'=>$image)
   );
   
   
    $message = "Product is added to your cart!";

    if(empty($_SESSION["shopping_cart"])) {
       $_SESSION["shopping_cart"] = $cartArray;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($code,$array_keys)) {
          $_SESSION["shopping_cart"] = $cartArray;
          $cart_count = count($_SESSION["shopping_cart"]);
        } else {
        $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

   }
   ?>
<html>
   <head>
      <title>Shop</title>
      <link rel="stylesheet" type="text/css" href=" css/style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
         crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
         crossorigin="anonymous">

   </head>
   <body>
      <!--HEADER & NAVBAR-->	
      <section id ="header">
         <nav class="navbar navbar-expand-sm  " id="main-nav">
            <img src="https://pngimage.net/wp-content/uploads/2018/06/peace-hand-png-2.png" style="width:5%;height:10%;" >
            <div class="container" >
               <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a href="#home" class="nav-link active">Home</a>
                     </li>
                     <li class="nav-item">
                        <a href="#nout" class="scrollto nav-link">Laptops</a>
                     </li>
                     <li class="nav-item">
                        <a href="#fon" class="scrollto nav-link">Phones</a>
                     </li>
                     <li class="nav-item">
                        <a href="#contact" class="scrollto nav-link">Contacts</a>
                     </li>
                  </ul>

                 
             
                  <?php
                     if(!empty($_SESSION["shopping_cart"])) {
                               $cart_count = count($_SESSION["shopping_cart"]);
                           }
                     if(empty($_SESSION["shopping_cart"])){
                         $cart_count=0;
                     }
                     
                     ?>
                  <div class="cart_div" style="	margin-left: 45%;">
                     
	                  <div style="display: inline-flex;font-family:'Helvetica';">
	                     <h1 style="font-size: 14px;color: #007bff;font-weight: bold;color: white;">Hello <?php echo $_SESSION['username']; ?></h1>

	                     <a style="font-size: 11px;color: white;" href="index.php?logout='1'">&nbsp LogOut&nbsp</a>
	                  </div> <i class="fas fa-user-circle" style="color:white;">&nbsp&nbsp&nbsp&nbsp|</i><a href="cart.php"><i class="fas fa-shopping-bag" style="color:white;"></i><span><?php echo $cart_count; ?></span></a>
                  </div>
               </div>
            </div>
         </nav>

         <script type="text/javascript">
            
    $(document).ready(function(){

      $.ajax({
        type:'post',
        url:'cart.php',
        data:{
          shopping_cart:"totalitems"
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });

    });

    function cart(id)
    {
     var ele=document.getElementById(id);
     var img_src=ele.getElementsByTagName("img")[0].src;
     var name=document.getElementById(id+"_name").value;
     var price=document.getElementById(id+"_price").value;
   
     $.ajax({
        type:'post',
        url:'cart.php',
        data:{
          item_src:img_src,
          item_name:name,
          item_price:price
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });
   
    }
       function show_cart()
    {
      $.ajax({
      type:'post',
      url:'store_items.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        $("#mycart").slideToggle();
      }
     });

         </script>
         <!--FIRST BANNER-->
      </section>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="d-block img-fluid" src="product-images/b4.jpg" alt="">
            <div style="margin-bottom: 150px;" class="carousel-caption d-none d-md-block ">
               <h2>TECH</h2>
               <p>DO IT</p>
               <button type="submit" class="btn btn-primary" name="login_user">ORDER NOW</button>
            </div>
         </div>
      </div>
      </section>
      <!--OUR PRODUCTS DISPLAYED-->
      <div id="nout" class="revealator-slideup revealator-once">
      <?php
         $result = mysqli_query($con,"SELECT * FROM `products` WHERE category='laptop'");
         while($row = mysqli_fetch_assoc($result)){
         		echo "<div class='product_wrapper'>
         			  <form method='post' action=''>
         			  <input type='hidden' name='code' value=".$row['code']." />
         			  <div class='image'><img src='".$row['image']."' /></div>
         			  <div class='name'>".$row['name']."</div>
         		   	  <div class='price'>$".$row['price']."</div>
         			  <button type='submit' class='buy' id='total_items' onclick='show_cart();'>Buy Now</button>
         			  
         			  </form>
         		   	  </div>";
                 }
         
         ?>
      </div>
      <div style="clear:both;"></div>
      <div class="message_box" style="margin:10px 0px;">
         <?php //echo $status; ?>
      </div>
      <!--SECOND BANNER-->
      </section>
      <div class="banner">
         <h1 class="text-center text-white" style="padding-top: 100px;">IPhone X</h1>
      	<h4 class="text-white text-center" style="padding-bottom: 100px;">All-screen design.Longest battery life ever in an Iphone. Fastest Performance. </h4>
         <a href="#" style="text-decoration: none; font-weight: bold;">Learn More &#8250;</a>
      
      </div>
      </section>
      <!--connect to db debugged-->
      <div id="fon" class="revealator-slideup revealator-once">
      <?php
         $result2 = mysqli_query($con,"SELECT * FROM `products` WHERE category='phone'");
         while($row = mysqli_fetch_assoc($result2)){
         		echo "<div class='product_wrapper'>
         			  <form method='post' action=''>
         			  <input type='hidden' name='code' value=".$row['code']." />
         			  <div class='image'><img src='".$row['image']."' /></div>
         			  <div class='name'>".$row['name']."</div>
         		   	  <div class='price'>$".$row['price']."</div>
         			  <button type='submit' class='buy'>Buy Now</button>
         			  
         			  </form>
         		   	  </div>";
                 }
         mysqli_close($con);
         ?>
      </div>
      <div class="totop"><a href="#header" class="scrollto"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAY1BMVEX///9RUVFLS0tOTk709PRkZGRjY2P39/dERETa2trX19dISEjz8/Pf399JSUnc3NxAQECoqKhpaWmBgYGurq5+fn68vLxVVVXs7OyPj4+3t7ekpKSWlpbDw8OJiYnm5uacnJwUHOBMAAAEeklEQVR4nO2c6XrCIBBFFVyiuCXR2r19/6ds1UZNShIYhgB+9/xv8chcZnAbjQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACSZbEvi9kvRbnfhn4sHpjvZaaEPCNUNt7PQz8iZp7GSo7vkGr8FPoxsVJmNb+zY1aGflR8zAvV9Duhikep1NVM6ATHYzGdhH5sLEymLYKPojhvFzwppl+oHTv4GIo9gukX6rztkHmUXezM4CMoTvp38Kw4S7VQezN4VSzSVDQq0WoXUyxUC8E0s7iyEUyxaVjtYIq7aC2YmqLxKVpXTKdQSYIpKRqMam2KaRQqIYNpKbbe6I0UExjgiBm87WLsig4lWinGXaiOOxi/ouWo1qYYb6GS20RTMdZddM5g7IqGN3ozxRgLleGQiVuRKYNXxehu/WwZvCpGlkWnUa1NMaZCZc1gjIrsJVopxlKoXnYwJkUPGbwpxlCozG2iqRh+Fz1lMB5FjyX6pxj41s84i7YqBn3bxmsGr4oBBzhvbaKhGCyL3jN4UwxTqANk8KYYYhc9t4nwisQdlEf57zN8ZopDFyoxg1KutyIJRWKbkHIxGi2pikMWKjGDMjt/+nn5/8OmsSlSS1SsL3+/VTTFwQY46iFzKtEL1EIdaICjZlAsbv9juYm4UImjmszW9/9lEW8WyW2i8RWLBXUXfReqewYrIm0a1DahNF+SWRJPVK+K1BJVa91/21Kz6K9QuTJYQS5UX4ouoxqvoqdbv9uo1qIYU9NwHdX0UAc4D4XK1ybqRJNFaomKHsFomgbPqKaH3DQ4FbnbRJ1F+ELlbxN1gg9wPtpEQzFsofKOanqoWWS59fvNYEXAW7+/NsGjOHU2PGxIguYZrCDe+jcHR8F9RhLsHtX0bGm3/mzvJPjst03UWdJe8JfPLobvlBqViiRIHeDUt4PgfEcRNBnV9NCaRubQFZ8IKbRsE3VIA1z2QV+wtI8hMYMVlKYhPunrHa2XI7SJhqJ9ocojebWV/WIbcgYrCLf+DTmIX7ZF6liiF+ybhiL3C1tD61GtRdE2i3RDy37v0Cbq2A5wmxV5KTtBlzZRx/K9fkFfaWqxEEsGK6yyKAv6Qt/mQ5v2zRc6NgPc5s1hHeOpzepGb4LFALdzeW5nhsswZrDCeICTM5dlDAdT1gxWmDYNl7H0l8JkFedRTY9Z0xAO58yJrfaX1hqClBu92eIGis5z4mvvYeOlRC8YNI2d+48T5j2KTKOant4s7nKGVfLO04ZtVNPT0zQcX4aq6FL00CbqdDYNJsGuQvWYwYqOLO64BEejtxZF5lFNT+sAx5LBCn2hso9qetb6LLKV6AXda9/iONDPAS/G/y+qkrFEL3yo5ipZ4fRisw1fRfMJFsJtVtPxfNjdHWtSZZwp6CXP7tIoxa708uyuP4+ZEieUmuUDfztgks/U3+LZ8dNb/ifL/KU8lO+vg5wwTdav77+Lv+TLGL5YCgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABCOHzLaOfMpTWO9AAAAAElFTkSuQmCC" width="50px"></a></div>
      <!--FOOTER-->
    
<footer id="footer" >
         <div class="container">
            <div class="row row-pb-md">
               <div class="col-md-3 widget">
                  <h4>About Store</h4>
                  <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                  <p>
                     <ul class="social-icons">
                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        
                     </ul>
                  </p>
               </div>
               <div class="col-md-2 widget">
                  <h4>Customer Care</h4>
                  <p>
                     <ul class="links">
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Returns/Exchange</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Special</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Site maps</a></li>
                     </ul>
                  </p>
               </div>
               <div class="col-md-2 widget">
                  <h4>Information</h4>
                  <p>
                     <ul class="links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Order Tracking</a></li>
                     </ul>
                  </p>
               </div>

               <div class="col-md-2">
                  <h4>News</h4>
                  <ul class="links">
                     <li><a href="blog.html">Blog</a></li>
                     <li><a href="#">Press</a></li>
                     <li><a href="#">Exhibitions</a></li>
                  </ul>
               </div>

               <div class="col-md-3">
                  <h4>Contact Information</h4>
                  <ul class="links">
                     <li>291 Abaya Street, <br> Suite 721 Almaty 10016</li>
                     <li><a href="">+ 777 7777 777</a></li>
                     <li><a href="#">techcom@gmail.com</a></li>
                     
                  </ul>
               </div>
            </div>
         </div>
</body>
</html>

 <script src="js/jquery.js"></script>
   <link rel="stylesheet" href="css/fm.revealator.jquery.css">
   <script src="js/fm.revealator.jquery.js"></script>
   <script src="js/app.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
