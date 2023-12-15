<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())
}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendataan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
</head>

<body>
    <h1>Form Pendataan Penduduk</h1>

    <form method="post" action="{{ route('submit-data') }}">
        @csrf

        <label for="nik"><b>NIK:</b></label><br>
        <input type="text" id="nik" name="nik" required><br><br>

        <label for="name"><b>Nama:</b></label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="provinsi"><b>Provinsi:</b></label><br>
        <input type="text" id="provinsi" name="provinsi" required><br><br>

        <label for="kota"><b>Kota:</b></label><br>
        <input type="text" id="kota" name="kota" required><br><br>

        <label for="telpon"><b>Nomor Telepon:</b></label><br>
        <input type="tel" id="telpon" name="telpon" required><br><br>

        <button type="submit">Submit Pendataan</button><br><br>
    </form>
</body>

</html>