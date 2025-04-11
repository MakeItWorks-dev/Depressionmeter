<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DepressionMeter - History {{ $user->name }} </title>

    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .container { padding-bottom: 50px; } /* Jaga agar footer tidak menimpa konten */
        .title { text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 20px; }
        .section { margin-bottom: 15px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid black; padding: 8px; text-align: center; }
        .table th { background-color: #ddd; }
        
        /* Footer Styling */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #555;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }

        .x {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #555;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }


        @page {
            margin: 20px;
        }

        @media print {
            .footer {
                position: fixed;
                bottom: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">DepressionMeter</div>
        <div class="x">Generated on {{ now()->format('F j, Y') }} | DepressionMeter Report</div>

        <div class="section">
            <h3>Profile</h3>
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <div class="section">
            <h3>Riwayat Analisa</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu Analisis</th>
                        <th>Username</th>
                        <th>Hasil</th>
                        <th>Positif</th>
                        <th>Negatif</th>
                        <th>Netral</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $data)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $data['tanggal_prediksi'] }}</td>
                        <td>{{ $data['username'] }}</td>
                        <td>{{ $data['persentase_depresi'] }}</td>
                        <td>{{ $data['qty_positif'] }}</td>
                        <td>{{ $data['qty_negatif'] }}</td>
                        <td>{{ $data['qty_netral'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer di setiap halaman -->
    <div class="footer">
        Generated on {{ now()->format('F j, Y') }} | DepressionMeter Report
    </div>
</body>
</html>
