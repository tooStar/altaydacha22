<?
if ($_POST['diya']=='plus') 
    {
        $c=$_POST['a']+$_POST['b'];
echo "суммачисел = $c";
    } else {
        $c=$_POST['a']*$_POST['b'];
echo "произведение чисел = $c";
    }
echo "<br> <a href='lab2.1.html'> Перейти на предыдущую страницу</a>";
?>
