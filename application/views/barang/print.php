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
        <h3><center>Laporan Data Barang</center></h3>
        <br/>
        <table class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stok Barang</th>
                    <th>Tanggal Update Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach($barang as $b){
                ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $b['supplier']; ?></td>
                    <td><?= $b['nama']; ?></td>
                    <td>Rp. <?= $b['harga']; ?></td>
                    <td><?= $b['stok']; ?></td>
                    <td><?= $b['tgl_update']; ?></td>
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