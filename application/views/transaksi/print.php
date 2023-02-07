<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <style type="text/css">
            .table-data{
            width: 100%;
            border-collapse: collapse;
            }
            .table-data tr th,
            .table-data tr td{
            border:1px solid black;
            font-size: 11pt;
            font-family:Verdana;
            padding: 10px 10px 10px 10px;
            }
            .table-data th{
            background-color:grey;
            }
            h3{
            font-family:Verdana;
            }
        </style>
        <h3><center>Laporan Data Transaksi</center></h3>
        <br/>
        <table class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Jenis</th>
                    <th>Berat</th>
                    <th>Tanggal Tranasksi</th>
                    <th>Tanggal Ambil</th>
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach($transaksi as $t){
                ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $t['customer']; ?></td>
                    <td><?= $t['jenis']; ?></td>
                    <td><?= $t['berat']; ?> Kg</td>
                    <td><?= $t['tgl_transaksi']; ?></td>
                    <td><?= $t['tgl_ambil']; ?></td>
                    <td>Rp.<?= $t['total']; ?></td>
                    <td><?= $t['status']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>