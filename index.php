<?php include 'products.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Product CRUD</h1>

    <!-- Form to create a new product -->
    <form action="index.php" method="POST" id="product-form">
        <input type="text" name="name" id="name" placeholder="Product Name" required>
        <input type="number" name="price" id="price" placeholder="Product Price" required step="0.01">
        <button type="submit" name="create">Create Product</button>
    </form>

    <h2>Product List</h2>
    <table id="product-list">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['price']); ?> €</td>
                    <td><a href="index.php?delete=<?php echo $product['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>
