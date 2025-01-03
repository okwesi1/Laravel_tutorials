<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            width: 300px;
            margin-right: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            max-width: 600px;
            margin: 0 auto;
        }

        li {
            background: white;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        p {
            text-align: center;
            color: #6c757d;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            border: 1px solid #007bff;
            border-radius: 5px;
            margin: 0 5px;
            color: #007bff;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Welcome to Richard Deals</h1>

    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    @if ($products->count())
        <ul>
            @foreach ($products as $product)
                <li>{{ $product->name }} - {{ $product->description }} - ${{ $product->price }}</li>
            @endforeach
        </ul>

        {{ $products->links() }} <!-- Pagination links -->
    @else
        <p>No products found.</p>
    @endif
</body>
</html>
