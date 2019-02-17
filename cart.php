<?php
   session_start();
   $status="";
   if (isset($_POST['action']) && $_POST['action']=="remove"){
   if(!empty($_SESSION["shopping_cart"])) {
   	foreach($_SESSION["shopping_cart"] as $key => $value) {
   		if($_POST["code"] == $key){
   		unset($_SESSION["shopping_cart"][$key]);
   		$status = "<div class='box' style='color:red;'>
   		Product is removed from your cart!</div>";
   		}
   		if(empty($_SESSION["shopping_cart"]))
   		unset($_SESSION["shopping_cart"]);
   			}		
   		}
   }
   
   if (isset($_POST['action']) && $_POST['action']=="change"){
     foreach($_SESSION["shopping_cart"] as &$value){
       if($value['code'] === $_POST["code"]){
           $value['quantity'] = $_POST["quantity"];
           break; // Stop the loop after we've found the product
       }
   }
     	
   }
   ?>
<html>
   <head>
      <link rel='stylesheet' href='css/style.css' type='text/css' />
      <link rel='stylesheet' href='css/style1.css' type='text/css' />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
         crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
         crossorigin="anonymous">    
    <script src="js/jquery.js"></script>
	<link rel="stylesheet" href="css/fm.revealator.jquery.css">
	<script src="js/fm.revealator.jquery.js"></script>
   </head>
   <body style="background-color: #f2f2f2; font-family: 'Helvetica';" class="revealator-zoomin  revealator-once">
      <div style="width:700px; margin:50 auto;">
         <h2 class="text-center">Shopping Cart</h2>
         <?php
            if(!empty($_SESSION["shopping_cart"])) {
            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
            ?>
         <?php
            }
            ?>
         <div class="cart">
            <?php
               if(isset($_SESSION["shopping_cart"])){
                   $total_price = 0;
               ?>	
            <table class="table">
               <tbody>
                  <tr>
                     <td></td>
                     <td>ITEM NAME</td>
                     <td>QUANTITY</td>
                     <td>PRICE</td>
                     <td>TOTAL</td>
                  </tr>
                  <?php		
                     foreach ($_SESSION["shopping_cart"] as $product){
                     ?>
                  <tr>
                     <td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
                     <td>
                        <?php echo $product["name"]; ?><br />
                        <form method='post' action=''>
                           <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                           <input type='hidden' name='action' value="remove" />
                           <button type='submit' class='remove'>Remove Item</button>
                        </form>
                     </td>
                     <td>
                        <form method='post' action=''>
                           <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                           <input type='hidden' name='action' value="change" />
                           <select name='quantity' class='quantity' onchange="this.form.submit()">
                              <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                              <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                              <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                              <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                              <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                           </select>
                        </form>
                     </td>
                     <td><?php echo "$".$product["price"]; ?></td>
                     <td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
                  </tr>
                  <?php
                     $total_price += ($product["price"]*$product["quantity"]);
                     }
                     ?>
                  <tr>
                     <td colspan="5" align="right">
                        <strong>TOTAL: <?php echo "$".$total_price; ?></strong>
                     </td>
                  </tr>
               </tbody>
            </table>
            <?php
               }else{
               	echo '<h3 class="text-center">Your cart is empty!</h3>';
               	}
               ?>
         </div>
         <a class="btn btn-primary " style="margin-top:50px; height: 35px; border-radius: 10px;" role="button" href="index.php">Back to Shop</a>
         <a class="btn btn-primary text-right" style="margin-top:50px; height: 35px; border-radius: 10px;" role="button" href="index.php">Buy Now</a>
         <div style="clear:both;"></div>
         <br /><br />
      </div>
   </body>
</html>