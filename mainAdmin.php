<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php'; ?>
<?php include 'functions.php';?>


<?php include 'include/header.php'; ?>
    <title>Admin Page</title>
</head>
<body>
<header>    
    <h1>Admin Page</h1>
    <?php pleaseLoginAdmin();?>
</header>
    <a href="uploadProduct.php">Upload Inventory Item</a><br>
    <a href="deleteProduct.php">Delete Inventory Item</a><br>
    <a href="updateProduct.php">Update Inventory Item</a><br>
    <br>
    <br>
    <a href="index.php">Home</a>
</body>
</html>
