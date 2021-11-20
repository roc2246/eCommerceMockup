<?php 
/** 
 * The Condo - Delete Product Page
 * 
 * PHP version 7.4
 * 
 * @category Admin_Pages
 * @package  Pages
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/deleteProduct.php
 */

ob_start();
session_start(); 
?>
<?php 
require 'include/connect.php' ;
require 'include/phpCRUD.php';
require 'functions.php'
;?>

<?php require 'include/header.php'; ?>
    <title>Delete Product</title>
</head>
<body>
<header>    
    <h1>Delete Inventory Items</h1>
    <?php pleaseLoginAdmin();?>
</header>
    <form action="deleteProduct.php" method="post">
             <div>
             <select name="ID">
                <?php showAllData();?>
             </select>
             </div>
            <?php deleteRows();?>
            
            <input type="submit" name="submit" value="DELETE">
            
        </form>

<a href="mainAdmin.php">Back</a>

</body>
</html>