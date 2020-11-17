<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
	<!-- Cart item -->
	
		<div class="wrap-table-shopping-cart bgwhite">

			<?php if($this->session->flashdata('sukses')) {
				echo '<div class="alert alert-warning">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
			} ?>

			<!-- <h1><?php echo $title ?></h1><hr> -->
			<div class="clearfix"></div>
		


<?php 
echo form_open(base_url('belanja/checkout'));
$kode_transaksi = random_string('alnum', 11);
?>

<div class="container">
  <div class="row">
  	<!-- kolom1 -->
    <div class="col">
      <table class="table">
					<thead>

				<tr class="table-row" style="font-weight: bold; background-color: #E8436C;">
					<td colspan="4" class="column-1" style="text-align: center; ">PENERIMA</td>
					
				</tr>
						<tr>
							<th >Kode Transaksi</th>
							<th>
								<input type="text" name="kode_transaksi" class="form-control"  value="<?php echo $kode_transaksi ?>" readonly required>
							</th>			
						</tr>

						<tr>
							<th >Penerima</th>
							<th>
								<input type="text" name="nama_pelanggan" class="form-control" placeholder="NAMA Lengkap"
							value="<?php echo $pelanggan->nama_pelanggan ?>" required>
						   </th>			
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" class="form-control" placeholder="Email"
							value="<?php echo $pelanggan->email ?>" required></td>
						</tr>
						
						<tr>
							<td>Telepon</td>
							<td><input type="text" name="telepon" class="form-control" placeholder="Telepon"
							value="<?php echo $pelanggan->telepon ?>" required></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $pelanggan->alamat ?>">
							</td>
						</tr>
						
					</tbody>
</table>
    </div>

<!-- kolom 2 -->
    <div class="col">
      <!--pengiriman-->


<table class="table">
<tr class="table-row" style="font-weight: bold; background-color: #E8436C;">
	<td colspan="4" class="column-1" style="text-align: center">PENGIRIMAN</td>					
</tr>
</table>

<table class="table">
					<thead>
						<tr>
							<td >Provinsi
							<td>

								<select class="selection-1" name="provinsi" id="provinsi">
								<option>Silahkan Pilih Provinsi</option>
								<?php foreach($provinsi as $p): ?>
								<option value="<?= $p->province_id ?>"><?= $p->province ?></option>
								<?php endforeach ?>
							
							</select>
							</td>			
						</tr>
						<tr>
							<td>Kabupaten
							<td>

							<select class="selection-1" name="kabupaten" id="kabupaten" required><select></td>			
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Ekpedisi</td>
							<td>
								 <select class="selection-1" id="ekpedisi" name="ekpedisi">
                  						<option value="jne">JNE</option>
                 						<option value="tiki">TIKI</option>
                  						<option value="pos">POS INDONESIA</option>
                </select>
								</td>
						</tr>

						<tr>
							<td>Service</td>
							<td><select class="selection-1" name="service" id="service" required>
								<select></td>
						</tr>
						
						<tr>
							<td>Estimasi</td>
							<td><input class="sizefull s-text7 p-l-22 p-r-22" type="text" readonly name="estimasi" id="estimasi"></td>
						</tr>
						<tr>
							<td>Ongkir</td>
							<td><input class="sizefull s-text7 p-l-22 p-r-22" type="text" readonly name="ongkir" id="ongkir"></td>
						</tr>
					</tbody>

				</table>

<!--pengiriman-->
    </div>
  </div>
</div>



<input type="hidden" name="id_pelanggan" 		value="<?php echo $pelanggan->id_pelanggan; ?>" >
<input type="hidden" name="tgl_cekout" 		value="<?php echo date('Y-m-d'); ?>" >

<table class="table">
<tr class="table-row" style="font-weight: bold; background-color: #E8436C;">
	<td colspan="4" class="column-1" style="text-align: center">PRODUK</td>					
</tr>
</table>


			<table class="table-shopping-cart" >
				<tr class="table-head">
					<th class="column-1"  		  							>GAMBAR</th>
					<th class="column-2"  style="text-align: center"		>PRODUK</th>
					<th class="column-3"  style="text-align: center"	 	>HARGA</th>
					<th class="column-4"  style="text-align: center"		>JUMLAH</th>
					<th class="column-5"   width="15%">SUB TOTAL</th>
					
				</tr>

				<!-- looping data keranjang -->
				<?php 
				// echo "<pre>";
				// print_r ($keranjang);
				// echo "</pre>";

				$berat_total = 0;
				//start looping
				foreach($keranjang as $keranjang) {
					//ambil data produk
					$id_produk = $keranjang['id'];
					$produk    = $this->produk_model->detail($id_produk);
					$berat_subtotal = $keranjang['weight']*$keranjang['qty'];
					$berat_total += $berat_subtotal;

				?>

				<tr class="table-row" >
					<td class="column-1" >
						<div class="cart-img-product b-rad-4 o-f-hidden">
							<img src="<?php echo base_url('assets/upload/image/thumbs/' .$produk->gambar) ?>" 
							alt="<?php echo $keranjang['name'] ?>">
						</div>
					</td>
					<td class="column-2" style="text-align: center"><?php echo $keranjang['name'] ?></td>
					<td class="column-3" style="text-align: center">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
					<td class="column-4" style="text-align: center"><?php echo $keranjang['qty'] ?></td>
					<td class="column-5" >Rp.

						<?php  
						$sub_total = $keranjang['price'] * $keranjang['qty'];
						echo number_format($sub_total,'0',',','.');
						?>

					</td>		
				</tr>

				<?php 
				//end looping
				}
				?>

				<tr class="table-row bg-light" style="font-weight: bold; color;white !important;">
					<td colspan="4" class="column-1">Total Belanja</td>
					<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
				</tr>

			</table>
			<br>





<table class="table">
<tr class="table-row" style="font-weight: bold; background-color: #E8436C;">
			<td colspan="4" class="column-1">BIAYA PENGIRIMAN</td>
			<td colspan="4" class="column-3" id="ongkir2"></td>
</tr>

<tr class="table-rowt" style="font-weight: bold; background-color: #E8436C;">
			<td colspan="4" class="column-1">TOTAL BELANJA</td>
			<td colspan="4" class="column-3">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
</tr>

<tr class="table-row" style="font-weight: bold; background-color: #E8436C;">
			<td colspan="4" class="column-1">TOTAL PEMBAYARAN</td>
			<td colspan="4" class="column-3" >Rp. <input style="background-color: unset; font-weight: bold;" id="total_pembayaran" type="text" name="total_pembayaran" readonly></td>
</tr>

</table>



<table class="table">
</tr>

						<tr style="text-align: right">
							<td >
								<button class="btn btn-dark" type="submit">
									<i class="fa  fa-paper-plane"></i> Check Out Sekarang
								</button>
							</td>
						</tr>
</table>



<?php 
// echo "<pre>";
// print_r ($berat_total);
// echo "</pre>";
//form close
echo form_close();
 ?>




<!--ONGKIR-->

		<script>
		$('document').ready(function(){
			var total_belanja = <?= $this->cart->total() ?>;
			var harga = <?= $produk->harga ?>;
			var berat = <?= $berat_total ?>;
			var ongkir = 0;
			$("#provinsi").on('change', function(){
				$("#kabupaten").empty();
				$("#service").empty();
				$("#estimasi").empty();
				$("#ongkir").empty();
				var id_province = $(this).val();
				$.ajax({
					url : "<?= site_url('belanja/getcity')?>",
					type : 'GET',
					data : {
						'id_province': id_province,
					},
					dataType : 'json',
					success : function(data){
						var parse = JSON.parse(data);
						// console.log(data);
						var results = parse.rajaongkir.results;

						for(var i=0; i<results.length; i++)
						{
							$("#kabupaten").append($('<option>',{
								value : results[i]["city_id"],
								text : results[i]["city_name"]
							}));
						}

					},

				});
			}); 

			$("#ekpedisi").on('change',function(){
				$("#service").empty();
				$("#estimasi").empty();
				$("#ongkir").empty();
				var id_city = document.getElementById("kabupaten").value;
				var ekpedisi = document.getElementById("ekpedisi").value;
				$.ajax({
					url : "<?= site_url('belanja/getcost')?>",
					type : 'GET',
					data : {
						'origin': 209,
						'destination' : id_city,
						'weight' : berat,
						'courier' : ekpedisi

					},
					dataType : 'json',
					success : function(data){
					var parse = JSON.parse(data);
					console.log(parse.rajaongkir);
					var costs = parse.rajaongkir.results[0].costs;
					for(var i=0; i<costs.length; i++)
						{
							var text = costs[i]["description"]+"("+costs[i]["service"]+")";
							$("#service").append($('<option>',{
								value : costs[i]["cost"][0]["value"],
								text : text,
								etd : costs[i]["cost"][0]["etd"]
							}));
						}
					},

				});
			});

			$("#service").on('change',function(){
				ongkir = parseInt($(this).val());
					var estimasi = $('option:selected',this).attr('etd');
					var total_pembayaran = total_belanja+ongkir;
					//console.log(estimasi);
					
					$("#ongkir").val(ongkir);
					$("#estimasi").val(estimasi+" hari");
					$("#total_pembayaran").val(total_pembayaran);
					document.getElementById('ongkir2').innerHTML=new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(ongkir);
				


			});

		});
		</script>
<!--ONGKIR-->



		

	

</section>