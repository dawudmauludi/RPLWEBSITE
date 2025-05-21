<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="container">
    <h2>Kode Verifikasi</h2>
    <p>Halo,</p>
    <p>Kamu telah meminta ubah password untuk akun dengan email <strong>{{ $email }}</strong>.</p>
    <p>Gunakan kode berikut untuk melanjutkan:</p>
    <div class="code">{{ $token }}</div>
    <p>Kode ini berlaku selama 10 menit.</p>
    <div class="footer">Jika kamu tidak meminta ini, abaikan email ini.</div>
</div>
</body>
</html>
