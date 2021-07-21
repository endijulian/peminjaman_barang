<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
</head>
<body>

    <h3 style="text-align: center;">Cetak Laporan Peminjaman</h3>
    <table border="1" cellspacing="0" cellpading="0">
        <thead>
        <tr>
            <th style="width: 10px">No</th>
            <th>Barang</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Pengajuan</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($cetakPeminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->nama_barang ?? '' }}</td>
                    <td>{{ $item->users->name ?? '' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_peminjaman )->format('d M Y') ?? '' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengembalian )->format('d M Y') ?? '' }} </td>
                    <td>
                        @if ($item->status_pengajuan_id == 1)
                            <small class="badge badge-success">{{ $item->status_pengajuan->name_pengajuan }}</small>
                        @elseif ($item->status_pengajuan_id == 2)
                            <small class="badge badge-danger">{{ $item->status_pengajuan->name_pengajuan }}</small>
                        @else
                            <small class="badge badge-warning">{{ $item->status_pengajuan->name_pengajuan }}</small>
                        @endif
                    </td>
                    <td>{{ $item->note_barang }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center p-5">
                        <p>Data Tidak Tersedia</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        print();
    </script>
</body>
</html>