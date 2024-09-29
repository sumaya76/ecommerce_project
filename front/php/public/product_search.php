<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Products;

$serach_product=new Products();
$serach_product->productSearch();

?>

<!doctype html>
<html lang="en">
<?php
include_once ("../views/elements/head.php");
?>
<body>



<?php
include_once ("../views/elements/header.php");
include_once ("../views/elements/products_search_results.php");
include_once ("../views/elements/footer.php");
include_once ("../views/elements/script.php");
?>


</body>
</html>