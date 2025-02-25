<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DepressionMeter - Profile</title>
    <link href="{{ asset('assets/images/a.png') }}" rel="shortcut icon">

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


        /* Atur margin halaman PDF agar footer muncul di setiap halaman */
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
                        <th>Tanggal Hasil</th>
                        <th>Hasil</th>
                        <th>Positif</th>
                        <th>Negatif</th>
                        <th>Netral</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $data)
                    <tr>
                        <td>{{ $data['no'] }}</td>
                        <td>{{ $data['tanggal'] }}</td>
                        <td>{{ $data['hasil'] }}</td>
                        <td>{{ $data['positif'] }}</td>
                        <td>{{ $data['negatif'] }}</td>
                        <td>{{ $data['netral'] }}</td>
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
