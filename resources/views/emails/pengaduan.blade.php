<!DOCTYPE html>
<html>
<head>
    <title>Pengaduan Baru dari Website PUPR Garut</title>
</head>
<body>
    <h2>Pengaduan Baru dari Website PUPR Garut</h2>
    <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $data['telepon'] ?? '-' }}</p>
    <p><strong>Subjek:</strong> {{ $data['subjek'] }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $data['pesan'] }}</p>
</body>
</html>
