<?php

include_once "debugging.php";

/**
 * A final class of static member functions used to manipulate the
 * current session.
 * @author Andrew Leon
 *
 */
final class Session {
    // The key of the cart in the $_SESSION associative array.
    private static $CART_KEY = "cart";
    
    /**
     * Session is a final class of static member functions.
     */
    private function __constructor() {}
    
    /**
     * Starts a session if one doesn't exist and we're allowed to.
     */
    static public function startSession() : void {
        // If we're not allowed to start a PHP session, throw an exception.
        if (session_status() == PHP_SESSION_DISABLED) {
            throw Exception("Sessions are disabled!");
        }
            
        // Do nothing if a session is already active.
        else if (session_status() == PHP_SESSION_ACTIVE) {
            console_log("session already exists");
            return;
        }
            
        // Start the session
        else {
            session_start();
            console_log("starting session");
        }
    }
    
    /**
     * Stop the current session if one exists.
     */
    static public function endSession() : void {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_abort();
        }  
    }
    
    /**
     * Adds the given quantity of item to the cart.
     * 
     * @param string $itemID : The item's ID.
     * @param int $quantity  : The quantity of the item to add to the cart. Must be a
     *                         positive integer.
     */
    static public function addCartItem(string $productID, int $quantity) : void {
        $CART_KEY = Session::$CART_KEY;
        
        if ($quantity <= 0) {
            throw Exception("'quantity' must be a positive integer");
        }
            
        
        // If the cart isn't set yet, create it.
        if (!isset($_SESSION[$CART_KEY])) {
            $_SESSION[$CART_KEY] = array($productID => $quantity);
        }
            
        // If the provided item isn't in the cart, add the specified quantity.
        else if (!array_key_exists($productID, $_SESSION[$CART_KEY])) {
            $_SESSION[$CART_KEY][$productID] = $quantity;
        }
        
        // If the provided item is in the cart, add the given quantity.
        else {
            $currentQt = $_SESSION[$CART_KEY][$productID];
            $_SESSION[$CART_KEY][$productID] = $currentQt + $quantity;
        }    
    }
    
    /**
     * Remove an item from the cart.
     * @param string $itemID : The item's ID.
     */
    static public function removeCartItem(string $productID) : void {
        $CART_KEY = Session::$CART_KEY;
        if (array_key_exists($productID, $_SESSION[$CART_KEY]))
            unset($_SESSION[$CART_KEY][$productID]);
    }
    
    /**
     * @return array : The associative array that represents the cart.
     * Keys are itemID's and values are their quantity. 
     */
    static public function getCart() : array {
        return $_SESSION[Session::$CART_KEY];
    }
    
    /**
     * Clears the cart (by setting the cart to an empty array).
     */
    static public function clearCart() : void {
        $_SESSION[Session::$CART_KEY] = array();
    }
}


?>