<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center text-success mb-4">➕ Add New Product</h2>

    <form method="POST" action="/save-product" class="p-4 shadow bg-white rounded">
        @csrf

        <div class="mb-3">
            <label class="form-label">Product Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Price (₹):</label>
            <input type="number" name="price" class="form-control" placeholder="Enter price" required>
            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Write short description" required></textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Add Product ✅</button>
    </form>
</div>
</body>
</html>
