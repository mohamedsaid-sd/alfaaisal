<!DOCTYPE html>
<html dir="rtl">
<head>
	<title> صفحة الطباعة </title>
</head>
<style type="text/css">
table tr td{
	padding: 2px;
	margin: 0px;
	border: solid 1px black;
	text-align: right;
}
div{
	position: absolute;
	top: 3px;
	right: 130px;
}
</style>
<body onload="window.print();">


<!-- <h1> شركة الفيصل للإستثمار </h1> -->



<?php 
include '../config.php';



$coupons_sql = "SELECT * FROM `coupons` ";
$coupons_result = mysqli_query($conn,$coupons_sql);
$i = 1;
$count = 0;
// while ($coupons_row = mysqli_fetch_array($coupons_result)) {

    echo "<table style='width:100%; text-align:center; margin:auto;'>";
    echo "<tr>";

    $count = 0; // عداد للتحكم بعدد الأعمدة
    while ($coupons_row = $coupons_result->fetch_assoc()) {
        echo "<td> (".$i.") " . $coupons_row['code'] . "</td>";
        $count++;

        // بدء صف جديد بعد كل خمسة أعمدة
        if ($count % 5 == 0) {
            echo "</tr><tr>";
        }
        $i++;
    }

    // في حالة وجود صف ناقص، أكمله بخلايا فارغة
    if ($count % 5 != 0) {
        $remaining_cells = 5 - ($count % 5); // عدد الخلايا الناقصة
        for ($i = 0; $i < $remaining_cells; $i++) {
            echo "<td></td>"; // إضافة خلية فارغة
        }
    }

    echo "</tr>";
    echo "</table>";
// }

?>
<!-- </tbody>
</table> -->

</body>
</html>