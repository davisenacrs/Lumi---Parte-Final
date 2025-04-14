<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/logout.css">
    <title>Logout</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
session_unset(); 
session_destroy(); 
header("Location: index.php"); 
exit();
?>
