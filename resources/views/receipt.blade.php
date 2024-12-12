<!DOCTYPE html>
<html>
<head>
    <title>Resi Pembelian</title>
    <style>
        body { font-family: DejaVu Sans; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { border: 1px solid #ddd; padding: 10px; }
        .details p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Resi Pembelian</h2>
            <p>Tanggal: {{ $tanggal }}</p>
        </div>
        <div class="details">
            <p><strong>Judul Buku:</strong> {{ $judul }}</p>
            <p><strong>Jumlah Beli:</strong> {{ $jumlah_beli }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($total_harga, 0, ',', '.') }}</p>
        </div>
    </div>
</body>
</html>
