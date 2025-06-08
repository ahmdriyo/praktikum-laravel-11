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
                <th scope="col">name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>