<?php
$textcolor = $_POST['textcolor'];
$bgcolor = $_POST['bgcolor'];
$shape1color = $_POST['shape1color'];
$shape2color = $_POST['shape2color'];
$shape3color = $_POST['shape3color'];
$align = $_POST['align'];
$valign = $_POST['valign'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 32 - Table with Custom Styles</title>
</head>
<body>
<table style="border-collapse: collapse; width: 100%; height: 100%;">
    <tr>
        <td align="<?php echo $align; ?>" valign="<?php echo $valign; ?>" style="background-color: <?php echo $bgcolor; ?>; height: 500px;">
            <p style="color: <?php echo $textcolor; ?>; font-size: 24px;">Text</p>
            <svg height="50" width="50">
                <circle cx="25" cy="25" r="20" stroke="black" stroke-width="1" fill="<?php echo $shape1color; ?>" />
            </svg>
            <svg height="50" width="50">
                <rect x="10" y="10" width="30" height="30" stroke="black" stroke-width="1" fill="<?php echo $shape2color; ?>" />
            </svg>
            <svg height="50" width="50">
                <polygon points="25,0 50,50 0,50" stroke="black" stroke-width="1" fill="<?php echo $shape3color; ?>" />
            </svg>
        </td>
    </tr>
</table>
<br>
<a href="lab3.2.html">Back</a>
</body>
</html>