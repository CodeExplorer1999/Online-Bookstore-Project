<?php   
 session_start();  
 include("connect.php");

 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["book_id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'=> $_GET["book_id"],  
                     'item_name'=> $_POST["hidden_name"],  
                     'item_price'=> $_POST["hidden_price"],  
                     'item_quantity'=> $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'=>$_GET["book_id"],  
                'item_name'=>$_POST["hidden_name"],  
                'item_price'=>$_POST["hidden_price"],  
                'item_quantity'=>$_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["book_id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     //echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Cart</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

           <link rel="stylesheet" type="text/css" href="style2.css"> 
      </head>  
      <body> 
      <header>
        <a href="index.php" class="header-brand">ace</a>
        <nav>
            <ul>
                <li><a href="#">New</a></li>
                <li><a href="#">Holiday</a></li>
                <li><a href="books.php">Books</a></li>
            </ul>
                <img src="images/ace.png" alt="ACE logo" class="header-logo">
        </nav>
    </header> 
           <br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">BOOKS</h3><br />  
                <?php  
                $query = "SELECT * FROM book ORDER BY book_id ASC";  
                $result = mysqli_query($db, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="cart.php?action=add&book_id=<?php echo $row["book_id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["title"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["title"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Book Title</th>  
                               <th width="10%">Qty</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&book_id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>


 
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td><a href="http://stackoverflow.com"><button type="button" class="btn btn-success">ORDER</button></a></td>    
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  

    <footer>
    <ul>
        <li><a href="#">Home</li>
        <li><a href="books.php">Books</li>
        <li><a href="index.php">Log Out</li>
        <li><a href="#">About Us</li>
        <li><a href="#">Contact Us</li>
    </ul>
        <div class="footer-socialmedia">
            <a href="#">
            <img src="images/twitter.png" alt="twitter logo">
            </a>
            <a href="#">
            <img src="images/instagram.png" alt="instagram logo">
            </a>
            <a href="#">
            <img src="images/facebook.png" alt="facebook logo">
            </a>
        </div>
</footer>
      </body>  
 </html>