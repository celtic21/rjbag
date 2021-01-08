<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title; ?></title>
   <style type="text/css" media="print">
    body{
      font-size: 12px;
      font-family: Arial;
    }
    table{
      border: solid thin #000;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 1cm;
    }
    td{
      padding: 6px 12px;
      border: solid thin #000;
      text-align: left;
    }.bg-success{
      background-color: #F5F5F5;
      font-weight: bold;
      border: solid thin #000;
    }
  </style>
  <style type="text/css" media="screen">
    body{
      font-size: 12px;
      font-family: Arial;
    }
    table{
      border: solid thin #000;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 1cm;
    }
    td{
      padding: 6px 12px;
      border: solid thin #000;
      text-align: left;
    }.bg-success{
      background-color: #F5F5F5;
      font-weight: bold;
      border: solid thin #000;
    }
  </style>
</head>

<body onload="print()">

   <h3>Laporan Penjualan</h3>
   <table id="example1" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah Terjual</th>
            <th>Sub Total</th>
           
    
         </tr>
      </thead>
      <tbody>
       <?php $no = 1;
         $total = 0;
         $sub_total = 0;


         foreach ($transaksi as $transaksi ) { 
 $sub_total = $transaksi->jumlah * $transaksi->harga;
?>
                  <tr>
                     <td width="30px"><?= $no++ ?></td>
                     <td><?= tgl_indo($transaksi->tgl_konfirmasi)?></td>
                     <td><?= $transaksi->nama_produk ?></td>
                     <td style="text-align: right;"><?= rupiah($transaksi->harga) ?></td>
                     <td><?= $transaksi->jumlah ?></td>
                     <td style="text-align: right;"><?= rupiah($sub_total) ?></td>
                  </tr>

                 <?php     $total += $sub_total; ?> 

       <?php  }  ?> 
         
      </tbody>
      <tfoot>
         <tr>
            <th colspan="5" style="text-align: center;"> Total Keseluruhan </th>
            <th><?= rupiah($total) ?></th>
         </tr>
      </tfoot>
   </table>

</body>

</html>