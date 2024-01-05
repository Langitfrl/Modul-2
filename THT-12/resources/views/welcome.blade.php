<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Hospitals</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=SF+Pro+Display:wght@400&display=swap">
    <style>
        body {
            font-family: 'SF Pro Display', 'Helvetica Neue', sans-serif;
            background-color: #f5f2e8;
            margin: 0;
            padding: 0;
            color: #2c2929;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, p, a {
            font-family: 'SF Pro Display', 'Helvetica Neue', sans-serif;
        }

        h1 {
            font-family: Garamond;
            text-align: center;
            color: #5e493a;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            color: #5e493a;
            margin-bottom: 5px;
        }

        input {
            width: 250px;
            padding: 10px;
            border: 1px solid #b5a997;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #d9d0bb;
        }

        button {
            background-color: #5e493a;
            color: #f5f2e8;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2c2929;
        }

        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        li {
            background-color: #e1dbc6;
            border: 1px solid #b5a997;
            margin: 10px;
            padding: 10px;
            border-radius: 8px;
            width: 250px;
            transition: transform 0.2s ease-in-out, background-color 0.2s ease-in-out;
            cursor: pointer;
        }

        li:hover {
            transform: scale(1.05);
            background-color: #b5a997;
        }

        strong {
            color: #5e493a;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #b5a997;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        p {
            margin: 5px 0;
        }

        a {
            color: #5e493a;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Daftar Rumah Sakit</h1> 
    <form action="{{ route('tampil-data') }}" method="post">
        @csrf
        <input type="text" name="province" id="province" placeholder="Cari Provinsi">
        <button type="submit">Submit</button>
    </form>
    <ul>
        @foreach ($hospitals as $hospital)
            <li>
                <strong>{{ $hospital['name'] }}</strong><br>
                <p><strong>Alamat:</strong> {{ $hospital['address'] }}</p>
                <p><strong>Region:</strong> {{ $hospital['region'] }}</p>
                <p><strong>Telepon:</strong> {{ $hospital['phone'] ?: 'Tidak tersedia' }}</p>
                <p><strong>Provinsi:</strong> {{ $hospital['province'] }}</p>
                <hr>
            </li>
        @endforeach
    </ul>
    @if(Request::routeIs('tampil-data'))
        <a href="{{ route('halaman-utama') }}"> << Kembali ke halaman utama</a>
    @endif
</body>
</html>
