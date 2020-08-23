<body onload="window.print()">
    <div style="max-width: 720px; margin: 10px auto;">
        <center>
            <h5><u>BERITA ACARA SERAH TERIMA BARANG</u></h5>
        </center>

        <p style="text-align: justify;">
            Pada hari ini Tanggal <?php
                                    $dc = date_create($pk->tgl_pemakaian);
                                    echo date_format($dc, 'd M Y'); ?>. Kami yang bertandatangan dibawah ini :
        </p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: Marzuki</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Manager</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: Jl. Garuda Sakti, Pekanbaru</td>
            </tr>
        </table>
        <p>Selanjutnya disebut PIHAK PERTAMA</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: {{$pk->nm_karyawan}}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Karyawan</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{$pk->alamat}}</td>
            </tr>
        </table>
        <p style="text-align: justify;">
            Selanjutnya disebut PIHAK KEDUA
            <br>
            PIHAK PERTAMA menyerahkan barang kepada PIHAK KEDUA, dan PIHAK KEDUA menyatakan telah menerima barang dari PIHAK PERTAMA berupa daftar terlampir :
        </p>
        <table border="1" cellspacing="0" cellpadding="5" style="width: 100%">
            <tr>
                <th>Nama Barang</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td>{{$barang->nm_barang}}</td>
                <td>{{$pk->kd_barang}}</td>
                <td>{{$barang->nm_kategori}}</td>
                <td>{{$barang->merek}}</td>
                <td>{{$barang->tipe}}</td>
                <td>{{$pk->keterangan}}</td>
            </tr>
        </table>
        <p style="text-align: justify;">
            Demikianlah berita acara serah terima barang ini di perbuat oleh kedua belah pihak, adapun barang-barang tersebut dalam keadaan baik dan cukup, sejak penandatanganan berita acara ini, maka barang tersebut, menjadi tanggung jawab PIHAK KEDUA, memelihara / merawat dengan baik serta dipergunakan untuk keperluan (tempat dimana barang itu dibutuhkan).
        </p>
        <br>
        <table style="width: 100%; text-align: center;">
            <tr>
                <td>
                    Yang Menerima :
                    <br />
                    PIHAK KEDUA
                    <br /><br /><br /><br />
                    ({{$pk->nm_karyawan}})
                </td>
                <td>
                    Yang Menyerahkan :
                    <br />
                    PIHAK PERTAMA
                    <br /><br /><br /><br />
                    (MARZUKI)
                </td>
            </tr>
        </table>
    </div>
</body>