<body onload="window.print()">
    <div style="text-align: center; margin: 0 auto;">
        <h4><u>Laporan Data Barang</u></h4>

        <table border='1' cellpadding="7" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Tanggal Beli</th>
                <th>Supplier</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Serial Number</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
            @foreach($barang as $b)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$b->kd_barang}}</td>
                <td>{{$b->nm_barang}}</td>
                <td>{{$b->nm_kategori}}</td>
                <td><?php $dc = date_create($b->tgl_beli);
                    echo date_format($dc, 'd M Y'); ?></td>
                <td>{{$b->nm_supplier}}</td>
                <td>{{$b->merek}}</td>
                <td>{{$b->tipe}}</td>
                <td>{{$b->serial_number}}</td>
                <td>{{$b->keterangan}}</td>
                <td>{{$b->status}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>