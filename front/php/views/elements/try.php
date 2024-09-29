// Fetch all products with their stock quantities and pictures
$stockQuery = "SELECT id, title, qty, picture 
FROM products WHERE 1";
$stockResult = $conn->query($stockQuery);

$productsInStock = [];
if ($stockResult && $stockResult->num_rows > 0) {
    while ($row = $stockResult->fetch_assoc()) {
        $productsInStock[] = $row;
    }
}