<?php
$sum = 0 ;
function fetchShopPage(){
    
    include 'db_conn.php' ;
    
    $query=mySQLi_query($conn,"SELECT * FROM medicine") ;
    
    while($row=mySQLi_fetch_array($query)){
    
        if ($row['brand'] == 1){
            echo '
                <div class="col-sm-6 col-lg-4 text-center item mb-4" style="position:relative; top:60px;">
                    <a href="shop-single.php?id='. $row['id'] .'"> <img width="130" height="270" src="'. $row['image'].'" alt="Image"></a>
                    <h3 class="text-dark"> <a href="shop-single.php?id='.$row['id'].'" style="position:relative; top:40px;">'. $row['name'].'</a></h3>
                    <p class="price" style="position:relative; top:40px;"> $'.$row['price'].'</p> 
                </div>
                ';
            }
            
        else{
            echo '
                <div class="col-sm-6 col-lg-4 text-center item mb-4">
                    <a href="shop-single.php?id='. $row['id'] .'"> <img src="'. $row['image'].'" alt="Image"></a>
                    <h3 class="text-dark"> <a href="shop-single.php?id='.$row['id'].'">'. $row['name'].'</a></h3>
                    <p class="price"> $'.$row['price'].'</p> 
                </div>
                ' ;
            }
        }
}

function fetchProudctHome($x){
    
    include 'db_conn.php' ;
    
    $query=mySQLi_query($conn,"SELECT * FROM medicine");
    
    while($row=mySQLi_fetch_array($query)){
        
        if($x != 0){
            echo '
                <div class="col-sm-6 col-lg-4 text-center item mb-4">
                    <a href="shop-single.php?id='.$row['id'].'"> <img src="'. $row['image'] .'" alt="Image"></a>
                    <h3 class="text-dark"><a href="shop-single.php?id='.$row['id'].' ">' .$row['name'] . ' </a></h3>
                    <p class="price">$'. $row['price'].'</p>
                </div> ';
            $x = $x-1 ;
        }
    }
}

function fetchNewProudcts(){
    
    include 'db_conn.php' ;
    
    $query=mySQLi_query($conn,"SELECT * FROM medicine");
    
    while($row=mySQLi_fetch_array($query)){
        
        
        echo '
            <div class="text-center item mb-4">
                <a href="shop-single.php?id='.$row['id'].'"> <img src=" '.$row['image'].' " alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.php?id='.$row['id'].'">'.$row['name'].'</a></h3>
                <p class="price">$'.$row['price'].'</p>
            </div> ' ;       
    }
}

function shopSingle() {

    $idURL = $_GET['id'];
    include 'db_conn.php' ;
    $query=mySQLi_query($conn,"SELECT * FROM medicine WHERE id = '$idURL'");
    while($row=mySQLi_fetch_array($query)){
        echo '
            <div class="bg-light py-3">
            <div class="container">
            <div class="row">
            <div class="col-md-12 mb-0"><a href="index.php">Home</a>
            <span class="mx-2 mb-0">/</span>
            <a href="shop.php">Store</a> 
            <span class="mx-2 mb-0">/</span> 
            <strong class="text-black">' . $row["name"] . '</strong>
            </div>
            </div>
            </div>
            </div>
            <div class="site-section">
            <div class="container">
            <div class="row">
            <div class="col-md-5 mr-auto">
            <div class="border text-center">
            <img src="' . $row["image"] . '" alt="Image" class="img-fluid p-5">
            </div>
            </div>
            <div class="col-md-6">
            <h2 class="text-black">' . $row["name"] . '</h2>
            <p>' . $row["description"] . '</p>
            <p><strong class="text-primary h4">$' . $row["price"] . '</strong></p>
        ';
    }
}

function fetchForCart(){
    
    include 'db_conn.php' ;
    if (isset($_SESSION['cart'])){
    
    foreach ($_SESSION['cart'] as $key => $value) {
        
        foreach ($value as $k => $v) {
            
            $id = $v ;
            $query=mySQLi_query($conn,"SELECT * FROM medicine WHERE id ='$id'");
            $row=mySQLi_fetch_array($query);
            $GLOBALS['sum'] = $GLOBALS['sum'] + (float) $row['price'] ;
            echo '
            
                <tr>
                    <td class="product-thumbnail">
                        <img src="'.$row['image'].'" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                        <h2 class="h5 text-black">'.$row['name'].'</h2>
                    </td>
                    <td>$'.$row['price'].'</td>
                    <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                    </td>
                    <td>$'.$row['price'].'</td>
                    <form action="cart.php?action=remove&id='.$row['id'].'" method="post" >
                    <td><button type="submit" name="remove" class="btn btn-primary height-auto btn-sm">X</button></td>
                    </form>
                </tr>
                
            ' ;  
        }
    }
}else{
    echo "<h5>Cart is Empty</h5>"; }

}

