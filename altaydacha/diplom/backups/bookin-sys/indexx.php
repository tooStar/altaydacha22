<?php
function build_calendar($month, $year){
    $mysqli = new mysqli('localhost','root','','booking-system');
    $stmt = $mysqli->prepare("SELECT * FROM room1 WHERE MONTH(date) = ? AND YEAR(date) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if ($stmt->execute()){
        $result = $stmt->get_result();
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }
            $stmt->close();
        }
    }

$daysofweek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
$firstdayofmonth = mktime(0,0,0, $month,1,$year);
$numberdays = date('t',$firstdayofmonth);
$datecomponents = getdate($firstdayofmonth);
$monthname = $datecomponents['month'];
$dayofweek = $datecomponents['wday'];

$datetoday = date('Y-m-d');

$calendar = "<table class = 'table table-bordered'>";
$calendar .= "<center><h2>$monthname $year</h2>";
$calendar.= "<a class = 'btn btn-xs btn-success' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."$year=".date('Y', mktime(0,0,0,$month-1, 1, $year))."'>Previous Month</a>";
$calendar.= "<a class = 'btn btn-xs btn-danger' href='?month=".date('m')."$year=".date('Y')."'>Current Month</a>";
$calendar.= "<a class = 'btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."$year=".date('Y', mktime(0,0,0,$month+1, 1, $year))."'>Next month</a></center><br>";

$calendar .= "<tr>";
foreach($daysofweek as $day){
    $calendar .= "<th class='header'>$day</th>";
}

$currentday = 1;
$calendar .= "</tr><tr>";

if ($dayofweek > 0){
    for ($k=0; $k<$dayofweek;$k++){
        $calendar .= "<td class='empty'></td>";
    }
}

$month = str_pad($month, 2, "0", STR_PAD_LEFT);

while ($currentday <= $numberdays){
    if ($dayofweek == 7){
        $dayofweek = 0;
        $calendar .= "</tr><tr>";
    }

    $currentdayrel = str_pad($currentday, 2, "0", STR_PAD_LEFT);
    $date = "$year-$month-$currentdayrel";

    $dayname = strtolower(date('1', strtotime($date)));
    $eventnum = 0;
    $today = $date == date('Y-m-d')? "today" : "";
    if ($date<date('Y-m-d')){
        $calendar.="<td><h4>$currentday</h4> <button class='btn btn-danger btn-xs' disabled> N/A</button>";
    }
    elseif (in_array($date, $bookings)){
        $calendar.="<td class='$today'><h4>$currentday</h4><button class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-lock'></span> Already Booked</button>";
    }
    else{
        $calendar.="<td class='$today'><h4>$currentday</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'> <span class='glyphicon glyphicon-ok'></span> Book Now</a>";
    }

    $calendar .="</td>";
    $currentday++;
    $dayofweek++;
}

if ($dayofweek != 7){
    $remainingdays = 7 - $dayofweek;
    for ($l=0;$l < $remainingdays; $l++){
        $calendar .= "<td class='empty'></td>";
    }
}

$calendar .= "</tr>";
$calendar .= "</table>";
echo $calendar;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Забронировать</title>
    <style>
        @media only screen and (max-width 760px),
        (min-device-width: 802px) and (max-device-width: 1020px){
            table, thead, tbody, th, td, tr {
                display:block;
            }
            
            .empty {
                display: none;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td{
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:nth-of-type(1):before{
                content: "Sunday";
            }
            td:nth-of-type(2):before{
                content: "Monday";
            }
            td:nth-of-type(3):before{
                content: "Tuesday";
            }
            td:nth-of-type(4):before{
                content: "Wednesday";
            }
            td:nth-of-type(5):before{
                content: "Thursday";
            }
            td:nth-of-type(6):before{
                content: "Friday";
            }
            td:nth-of-type(7):before{
                content: "Saturday";
            }

            @media only screen and (min-device-width: 320px) and (max-device-width: 480px){
                body{
                    padding: 0;
                    margin: 0;
                }
            }

            @media only screen and (min-device-width: 802px) and (max-device-width: 1020px){
                body{
                    width: 495px;
                }
            }

            @media only screen and (min-width: 640px){
                table{
                    table-layout: fixed;
                }
                td{
                    width: 33%;
                }
            }
            .row{
                margin-top: 20px;
            }

            .today{
                backgroudn:#eee;
            }
        }
    </style>
</head>
<body>
    <div class="caontainer">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" style="background: #2ecc71; border: none; color: #fff">
                    <h1>Online booking system</h1>
                </div>
                <?php
                    $datecomponents = getdate();
                    if (isset($_GET['month']) && isset($_GET['year'])){
                        $month = $_GET['month'];
                        $year - $_GET['year'];
                    }
                    else{
                        $month = $datecomponents['month'];
                        $year - $datecomponents['year'];
                    }
                    echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>