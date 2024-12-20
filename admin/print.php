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
$barcode_id = $_GET['id'];

$barcode_query = "SELECT * FROM `barcodes` WHERE `id` = $barcode_id";
$barcode_result = mysqli_query($conn,$barcode_query);
while ($barcode_row = mysqli_fetch_array($barcode_result)) {
	$barcode_image = $barcode_row['barcode'];
?>
<img style="float: left;" src="../images/logo.jpg" width="100">
<img style="float: right;" src="<?php echo $barcode_image ?>" width="100"/>
<div>
<h3> شركة الفيصل للاستثمار </h3>
<h3> استمارة كوبونات - <?php echo date("d/m/Y H:i"); ?>   </h3>

</div>
<br/>
<!-- <table width="100%" border="1">
	<thead>
	<tr>
		<th> # </th>
		<th> الرمز </th>
		<th> الرمز </th>
		<th> الرمز </th>
	</tr>
	</thead>
	<tbody> -->
<?php
}
$coupons_sql = "SELECT * FROM `coupons` WHERE `barcode` LIKE '$barcode_id' AND `status` LIKE '0'";
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