  <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-truck"></i> Pengiriman
            <small class="pull-right">Date: <?php echo date ('d/m/y') ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $site->namaweb ?></strong><br>
           <?php echo $site->alamat ?><br>
            Telepon : <?php echo $site->telepon ?><br>
            e-mail : <?php echo $site->email ?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $header_transaksi->nama_pelanggan ?></strong><br>
            <?php echo $header_transaksi->alamat ?><br>
            Telepon : <?php echo $header_transaksi->telepon ?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>kode transaksi: <?php echo $header_transaksi->kode_transaksi ?></b><br>
          Kurir : <?php echo $header_transaksi->ekpedisi ?>
            <br>Ongkir : <?php echo number_format($header_transaksi->ongkir) ?>
            <br>estimasi : <?php echo $header_transaksi->estimasi ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          </table>
    <table class="table table-bordered" width="100%">
  <thead>
    <tr class="bg-success">
      <th>NO</th>
      <th>NAMA PRODUK</th>
      <th>JUMLAH</th>
      <th>HARGA</th>
      <th>SUB TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($transaksi as $transaksi) { ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $transaksi->nama_produk ?></td>  
      <td><?php echo number_format($transaksi->jumlah) ?></td>
      <td>Rp. <?php echo number_format($transaksi->harga) ?></td>
      <td>Rp. <?php echo number_format($transaksi->total_harga) ?></td>

    </tr>
    <?php $i++; } ?>
    
  </tbody>
</table><span class="pull-right"><u ><span>TOTAL PEMBELIAN</span></u><span> : Rp. <?php echo number_format($header_transaksi->jumlah_bayar) ?></span>
</span>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

       <br>
        <div class="btn pull-right">
          <a href="<?php echo base_url('admin/transaksi/cetakkirim/' .$header_transaksi->kode_transaksi) ?>" target="_blank" title="cetak" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
        </div>

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <span class="fa fa-credit-card"> Trasnfer Bank</span>
        </div>
       
 
      <!-- /.row -->

      <!-- this row will not appear when printing -->
     
    
  </div>