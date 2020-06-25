<?php
$dsn = 'mysql:dbname=sample_db;host=localhost;';
$user = 'otsubo';
$password = 'morijyobi';
try {
    $dbh = new PDO($dsn, $user, $password);

    $sql = "select * from user";
    $result = $dbh->query($sql);
    $result2 = $dbh->query($sql);
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
                <?php if ($_GET['it'] == 1) { ?>
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        Insert table <strong>Success !!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else if ($_GET['it'] == 2) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        Insert table<strong>Failed !!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <form class="mt-3" action="./insert.php" method="POST">
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
                <?php if ($_GET['ue'] == 1) { ?>
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        Update table <strong>Success !!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else if ($_GET['ue'] == 2) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        Update table<strong>Failed !!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <form class="mt-3" action="./update.php" method="POST">
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
            <div id="tab4" class="tab-pane">
            <?php if ($_GET['de'] == 1) { ?>
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        Delete table <strong>Success !!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else if ($_GET['it'] == 2) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        Delete table<strong>Failed !!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
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
                        <?php foreach ($result2 as $value) { ?>
                            <tr>
                                <th><?php echo "$value[id]" ?></th>
                                <td><?php echo "$value[name]" ?></td>
                                <td><?php echo "$value[age]" ?></td>
                                <td>
                                    <form action="./delete.php" method="GET">
                                        <input class="d-none" type="text" name="id" value="<?php echo "$value[id]"; ?>">
                                        <button type="submit" class="btn btn-primary">delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <script type="text/javascript">
        $(function() {
            console.log("cookie:" + Cookies.get());

            if (Cookies.get("openTag")) {
                $('a[data-toggle="tab"]').removeClass('active');
                $('a[href="#' + Cookies.get("openTag") + '"]').click().addClass('active');
            }

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                var tabName = e.target.href;
                console.log("tabname:" + tabName);
                var items = tabName.split("#");
                console.log("items:" + items);

                Cookies.set("openTag", items[1]);
            });
        });
    </script>
</body>

</html>