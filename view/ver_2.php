<?php

$a = "select * from sumario order by titulo asc";
$b = mysql_query($a);
$cat = explode(", ", $categoria);

while ($i = mysql_fetch_array($b)) {
    $titulo = $i['titulo'];
    $id = $i['id'];
    $x = 0;
    while ($x < count($i)) {
        if ($cat[$x] == $titulo) {
            $y = "checked";
            break;
        } else {
            $y = " ";
        }
        $x++;
    }
    echo "<input name=\"categoria[]\" type=\"checkbox\" value=\"$titulo\" $y> $titulo<br>";
}
?>