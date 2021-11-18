<?php 
ob_start();
session_start(); 
?>
<?php 
include 'include/connect.php' ;
include 'include/phpCRUD.php';
include 'functions.php'
;?>

<?php include 'include/header.php'; ?>
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