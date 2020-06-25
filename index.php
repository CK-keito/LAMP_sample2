<?php
$dsn = 'mysql:dbname=sample_db;host=localhost;';
$user = 'otsubo';
$password = 'morijyobi';
try {
    $dbh = new PDO($dsn, $user, $password);

    $sql = "select * from user";
    $result = $dbh->query($sql);
    $del_list = $dbh->query($sql);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMP SAMPLE PAGE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="containar-fluir">
            <div class="navbar-header">
                <a href="demo.html" class="navbar-brand">LAMP SAMPLE PAGE</a>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">DB Manager</h1>
            <p class="lead">
                LAMP環境を構築し、DBを操作するアプリケーションです。</br>
                デザインはBootstrapを使用しています。
            </p>
        </div>
    </div>

    <div class="container">
        <?php if ($_GET['fg'] == 1) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Processing is complete . <strong>Success!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else if ($_GET['fg'] == 2) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Processing is complete . <strong>Failed!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    </div>

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#tab1" class="nav-link active" data-toggle="tab">Select</a>
            </li>
            <li class="nav-item">
                <a href="#tab2" class="nav-link" data-toggle="tab">Insert</a>
            </li>
            <li class="nav-item">
                <a href="#tab3" class="nav-link" data-toggle="tab">Update</a>
            </li>
            <li class="nav-item">
                <a href="#tab4" class="nav-link" data-toggle="tab">Delete</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="tab1" class="tab-pane active">
                <table class="table table-hover mt-2">
                    <caption>Show User Table</caption>

                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $value) { ?>
                            <tr>
                                <th><?php echo "$value[id]" ?></th>
                                <td><?php echo "$value[name]" ?></td>
                                <td><?php echo "$value[age]" ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div id="tab2" class="tab-pane">
                <form class="mt-5" action="./insert.php" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="id">ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="id" id="id" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Your Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="age">Age</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="age" id="age" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Insert</button>
                </form>
            </div>
            <div id="tab3" class="tab-pane">
                <form class="mt-5" action="./update.php" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="id">ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="id" id="id" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Your Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="age">Age</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="age" id="age" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Update</button>
                </form>
            </div>
            <div id="tab4" class="tab-pane">
                <table class="table table-hover mt-2">

                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>-</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($del_list as $value) { ?>
                            <tr>
                                <th><?php echo "$value[id]" ?></th>
                                <td><?php echo "$value[name]" ?></td>
                                <td><?php echo "$value[age]" ?></td>
                                <td>
                                    <form action="./delete.php" method="$_GET">
                                        <input type="text" class="d-none" name="id" value="<?php echo "$value[id]" ?>">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>