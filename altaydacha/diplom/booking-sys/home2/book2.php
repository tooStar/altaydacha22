<?php
if(isset($_GET['date'])){
    $date = $_GET['date'];
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $mysqli = new mysqli('localhost', 'root', '', 'booking-system');
    $stmt = $mysqli->prepare("INSERT INTO room2 (fio, phone, email, date) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $name, $phone, $email, $date);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Бронирование успешно!</div>";
    $stmt->close();
    $mysqli->close();
}

if(isset($_POST['exitsub'])){
    header('Location: index2.php');
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Забронировать дату: <?php echo date('d/m/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg)?$msg:''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Имя</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Телефон</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="">Почта</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Забронировать</button><br>
                    <button class="btn btn-primary" type="submit" name="exitsub">Назад</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>

</html>
