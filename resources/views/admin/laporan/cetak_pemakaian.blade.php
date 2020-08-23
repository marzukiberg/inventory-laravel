<body onload="window.print()">
    <div style="text-align: center; margin: 0 auto;">
        <h4><u>Laporan Pemakaian</u></h4>

        <table border='1' cellpadding="7" cellspacing="0" style="width: 100%;">
            <tr>
                <th>No.</th>
                <th>Nomor Pemakaian</th>
                <th>Barang</th>
                <th>Karyawan</th>
                <th>Tanggal Pakai</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Serial Number</th>
            </tr>
            @foreach($pemakaian as $pk)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$pk->no_pemakaian}}</td>
                <td>{{$pk->nm_barang}}</td>
                <td>{{$pk->nm_karyawan}}</td>
                <td><?php $dc = date_create($pk->tgl_pemakaian);
                    echo date_format($dc, 'd M Y'); ?></td>
                <td>{{$pk->merek}}</td>
                <td>{{$pk->tipe}}</td>
                <td>{{$pk->serial_number}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>