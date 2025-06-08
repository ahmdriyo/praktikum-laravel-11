<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>{{ $title }}</h2>
    <p><strong>Tanggal Cetak:</strong> {{ $date }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th scope="col">IMAGE</th>
                <th scope="col">TITLE</th>
                <th scope="col">PRICE</th>
                <th scope="col">STOCK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product-> id }}</td>
                <td class="text-center">
                    <img src="{{ public_path('storage/products/' . $product->image) }}" style="width: 150px">
                </td>
                <td>{{ $product->title }}</td>
                <td>{{ "Rp " . number_format($product->price, 2, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</body>

</html>