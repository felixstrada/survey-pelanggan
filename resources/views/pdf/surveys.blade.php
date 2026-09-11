<!DOCTYPE html>
<html>
<head>
    <title>Laporan Hasil Survei Pelanggan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; margin-bottom: 5px; }
    </style>
</head>
<body>
    <h2>Laporan Hasil Survei Pelanggan</h2>
    <p>Tanggal Cetak: {{ date('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>WhatsApp</th>
                <th>Email</th>
                <th>Sosial Media</th>
                <th>Rating</th>
                <th>Masukan / Saran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surveys as $index => $survey)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $survey->nama_lengkap }}</td>
                    <td>{{ $survey->No_whatsapp }}</td>
                    <td>{{ $survey->email }}</td>
                    <td>{{ $survey->sosialmedia ?? '-' }}</td>
                    <td>★ {{ $survey->rating }}</td>
                    <td>{{ $survey->masukan_saran ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>