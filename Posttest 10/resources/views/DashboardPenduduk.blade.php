<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Penduduk</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
</head>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">

<body>
    <h1>Selamat Datang!</h1>
    <p><b>NIK</b> : {{ $data['nik'] }}</p>
    <p><b>Nama</b> : {{ $data['name'] }}</p>
    <p><b>Provinsi</b> : {{ $data['provinsi'] }}</p>
    <p><b>Kota</b> : {{ $data['kota'] }}</p>
    <p><b>Nomor Telepon</b> : {{ $data['telpon'] }}</p>
</body>
</html>