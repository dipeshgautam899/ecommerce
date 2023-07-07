
<?php
    session_start();
    if(isset($_POST['add-to-cart'])){
        $product_id = $data['id'];
        $product_image = $data['product_image'];
        $product_name = $data['product_name'];
        $price = $data['price'];
        $quantity = $data['quantity'];

        $product_data = array(

            'id'=> $product_id,
            'product_image'=> $product_image,
            'name'=> $product_name,
            'price'=> $price,
            'quantity'=> 1
        );
        echo $product_data['id'];

        if (!isset($_SESSION['cart'])) { // if the cart session is not set, create it
            $_SESSION['cart'] = array(); // initialize an empty array for the cart
        }
    
        // check if the product is already in the cart
        $product_in_cart = false;
        foreach ($_SESSION['cart'] as &$product) { // use a reference to the cart array to modify it
            if ($product['id'] == $product_id) { // if the product is already in the cart, update its quantity
                $product['quantity']++;
                $product_in_cart = true;
                break;
            }
        }
    
        // if the product is not already in the cart, add it
        if (!$product_in_cart) {
            $_SESSION['cart'][] = $product_data; // add the product data to the cart array
        }
    
        // redirect back to the product page
        header('Location: product.php');
        exit;
    }
    ?>