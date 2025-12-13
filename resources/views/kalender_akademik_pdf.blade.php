<!DOCTYPE html>
<html>
<head>
    <title>Kalender Akademik 2025/2026</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; pb-20px; }
        .logo { font-size: 24px; font-weight: bold; color: #1e40af; margin-bottom: 5px; }
        .sub-header { font-size: 14px; color: #666; margin-bottom: 20px; }
        
        .semester-title {
            background-color: #f3f4f6;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            border-left: 5px solid;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .ganjil { border-left-color: #2563eb; color: #1e40af; }
        .genap { border-left-color: #10b981; color: #065f46; }

        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f9fafb; font-weight: bold; text-transform: uppercase; font-size: 11px; }
        
        .date-col { width: 25%; font-weight: bold; }
        .desc-col { width: 55%; }
        .note-col { width: 20%; text-align: center; }

        .text-red { color: #dc2626; }
        .text-blue { color: #2563eb; }
        .text-green { color: #16a34a; }
        
        .footer { position: fixed; bottom: 0; left: 0; right: 0; text-align: center; font-size: 10px; color: #999; border-top: 1px solid #eee; padding-top: 10px; }
        
        .signature { margin-top: 50px; text-align: right; page-break-inside: avoid; }
        .signature-box { display: inline-block; text-align: center; width: 200px; }
        .sign-name { font-weight: bold; text-decoration: underline; margin-top: 60px; }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">KAMPUS LSP</div>
        <div class="sub-header">Jl. Teknologi No. 12, Kota Digital, Indonesia</div>
        <h2>KALENDER AKADEMIK T.A. 2025/2026</h2>
    </div>

    <div class="semester-title ganjil">SEMESTER GANJIL (September 2025 - Januari 2026)</div>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kegiatan Akademik</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="date-col">1 - 30 Agustus 2025</td>
                <td>Registrasi Ulang & Pembayaran UKT</td>
                <td class="note-col text-green">Wajib</td>
            </tr>
            <tr>
                <td class="date-col">1 - 5 September 2025</td>
                <td>Pengisian Kartu Rencana Studi (KRS)</td>
                <td class="note-col text-blue">Online</td>
            </tr>
            <tr>
                <td class="date-col">8 September 2025</td>
                <td class="text-blue"><strong>Awal Perkuliahan Semester Ganjil</strong></td>
                <td class="note-col">-</td>
            </tr>
            <tr>
                <td class="date-col">27 - 31 Oktober 2025</td>
                <td>Ujian Tengah Semester (UTS)</td>
                <td class="note-col">Terjadwal</td>
            </tr>
            <tr>
                <td class="date-col text-red">22 Des - 2 Jan 2026</td>
                <td class="text-red">Libur Natal & Tahun Baru</td>
                <td class="note-col text-red">Libur</td>
            </tr>
            <tr>
                <td class="date-col">5 - 16 Januari 2026</td>
                <td>Ujian Akhir Semester (UAS)</td>
                <td class="note-col">Terjadwal</td>
            </tr>
        </tbody>
    </table>

    <div class="semester-title genap">SEMESTER GENAP (Februari 2026 - Juni 2026)</div>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kegiatan Akademik</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="date-col">2 - 6 Februari 2026</td>
                <td>Pengisian Kartu Rencana Studi (KRS) Genap</td>
                <td class="note-col text-blue">Online</td>
            </tr>
            <tr>
                <td class="date-col">9 Februari 2026</td>
                <td class="text-green"><strong>Awal Perkuliahan Semester Genap</strong></td>
                <td class="note-col">-</td>
            </tr>
            <tr>
                <td class="date-col">30 Mar - 3 Apr 2026</td>
                <td>Ujian Tengah Semester (UTS)</td>
                <td class="note-col">Terjadwal</td>
            </tr>
            <tr>
                <td class="date-col">15 - 26 Juni 2026</td>
                <td>Ujian Akhir Semester (UAS)</td>
                <td class="note-col">Terjadwal</td>
            </tr>
            <tr>
                <td class="date-col">Agustus 2026</td>
                <td><strong>Wisuda Sarjana & Diploma</strong></td>
                <td class="note-col text-blue">Tentative</td>
            </tr>
        </tbody>
    </table>

    <div class="signature">
        <div class="signature-box">
            <p>Kota Digital, 15 Juli 2025</p>
            <p>Rektor Kampus LSP</p>
            <div class="sign-name">Prof. Dr. Alvin Hujaya, M.Kom. M.Si.</div>
            <p>NIP. 19800101 200501 1 001</p>
        </div>
    </div>

    <div class="footer">
        Dokumen ini diunduh secara otomatis dari Sistem Informasi Akademik Kampus LSP pada {{ date('d F Y H:i') }}
    </div>

</body>
</html>