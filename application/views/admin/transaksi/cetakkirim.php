<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>

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
 

  <div style="width: 19cm; height: 27cm; padding-top: 1cm; ">
<div style="text-align: left; font-weight: bold;">
     <img src="<?php echo base_url() ?>assets/tampilan/kop.png" style="height :95px; width: 650px; text-align: center;" >
 </div>
  <H1 style="text-align: center; font-size: 18px; font-weight: bold; border-top: solid thin #EEE;
  padding-top: 20px;">PENGIRIMAN</H1>
  <small class="pull-right">Date: <?php echo date ('d/m/y') ?></small>
    <table>
      <tr>
        <td>
          <strong>PENGIRIM:</strong>
          <p>
            <?php echo $site->namaweb ?>
            <br><?php echo $site->alamat ?>
            <br>Telepon : <?php echo $site->telepon ?>
          </p>
        </td>
        <td>
          <strong>PENERIMA:</strong>
          <p>
            <?php echo $header_transaksi->nama_pelanggan ?>
            <br><?php echo $header_transaksi->alamat ?>
            <br>Telepon : <?php echo $header_transaksi->telepon ?>
          </p>
        </td>
        <td>
          <strong>Ekpedisi :</strong>
          <p>
            Kurir : <?php echo $header_transaksi->ekpedisi ?>
            <br>Ongkir : <?php echo number_format($header_transaksi->ongkir) ?>
            <br>estimasi : <?php echo $header_transaksi->estimasi ?>
          </p>
        </td>
      </tr>
    </table>
    <h2 style="font-weight: bold; text-align: center;">DATA PEMBELIAN</h2>
    <table class="table table-bordered" width="100%">
  <thead>
    <tr class="bg-success">
      <th>NO</th>
      <th>NAMA PRODUK</th>
      <th>JUMLAH</th>
  <!--     <th>HARGA</th>
      <th>SUB TOTAL</th> -->
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($transaksi as $transaksi) { ?>
    <tr>
      <td style="text-align: center"><?php echo $i ?></td>
      <td><?php echo $transaksi->nama_produk ?></td>  
      <td style="text-align: center"><?php echo number_format($transaksi->jumlah) ?></td>
<!--       <td><?php echo number_format($transaksi->harga) ?></td>
      <td><?php echo number_format($transaksi->total_harga) ?></td> -->

    </tr>
    <?php $i++; } ?>
    
  </tbody>
</table>
 <!--  <u ><span>TOTAL PEMBELIAN</span></u><span> : Rp. <?php echo number_format($header_transaksi->jumlah_bayar) ?></span> -->
  </div>
</div>
</body>
</html>