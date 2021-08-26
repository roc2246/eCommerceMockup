<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>
<?php pleaseLoginAdmin();?>

<?php include 'include/header.php'; ?>
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>
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