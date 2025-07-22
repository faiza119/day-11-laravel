<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .table td, .table th { vertical-align: middle; }
        .table th { background: #007bff; color: white; }
        .badge-price {
            background-color: #28a745;
            font-size: 0.9rem;
        }
        .product-box {
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            background-color: white;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-center text-primary mb-4">🛒 Our Awesome Products</h2>

    @if($products->isEmpty())
        <div class="alert alert-warning text-center">
            😔 No products found. <br>
            <a href="/insert-demo-products" class="btn btn-outline-primary mt-2">Click Here to Add Sample Products</a>
        </div>
    @else
        <div class="product-box">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price (₹)</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td><span class="badge badge-price">₹{{ number_format($product->price, 2) }}</span></td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->created_at->format('d M, Y h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

</body>
</html>
