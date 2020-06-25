<?php
    $dsn = 'mysql:dbname=sample_db;host=localhost;';
    $user = 'otsubo';
    $password = 'morijyobi';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id'];


        $sql = "delete from user where id = :id"; 
        $stmt = $dbh->prepare($sql);
        $params = array(':id' => $id);
        $stmt->execute($params);

        
        header('Location: index_demo.php?de=1');
        
    } catch (PDOException $e) {
        header('Location: index_demo.php?de=2?err='. $e->getMessage());
        exit();
    }
?>
