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

			<h1><?php echo $title ?></h1><hr>
			<div class="clearfix"></div>
			<br><br>


<?php 
echo form_open(base_url('belanja/checkout'));
$kode_transaksi = random_string('alnum', 11);
?>
<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>" >
<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>" >
<input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>" >

<table class="table">
					<thead>

				<tr class="table-row bg-success" style="font-weight: bold; color;white !important;">
					<td colspan="4" class="column-1" style="text-align: center">PENERIMA</td>
					
				</tr>
						<tr>
							<th width="25%">Kode Transaksi</th>
							<th>
								<input type="text" name="kode_transaksi" class="form-control"  value="<?php echo $kode_transaksi ?>" readonly required>
							</th>			
						</tr>

						<tr>
							<th width="25%">Nama Penerima</th>
							<th>
								<input type="text" name="nama_pelanggan" class="form-control" placeholder="NAMA Lengkap"
							value="<?php echo $pelanggan->nama_pelanggan ?>" required>
						   </th>			
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Email Penerima</td>
							<td><input type="email" name="email" class="form-control" placeholder="Email"
							value="<?php echo $pelanggan->email ?>" required></td>
						</tr>
						
						<tr>
							<td>Telepon Penerima</td>
							<td><input type="text" name="telepon" class="form-control" placeholder="Telepon"
							value="<?php echo $pelanggan->telepon ?>" required></td>
						</tr>
						<tr>
							<td>Alamat Pengiriman</td>
							<td><input name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $pelanggan->alamat ?>">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-success" type="submit">
									<i class="fa fa-save"></i> Check Out Sekarang
								</button>

								<button class="btn btn-default" type="reset">
									<i class="fa fa-times"></i> Reset
								</button>
							</td>
						</tr>
					</tbody>


				</table>


<?php echo form_close(); ?>

<table class="table">
<tr class="table-row bg-info" style="font-weight: bold; color;white !important;">
	<td colspan="4" class="column-1" style="text-align: center">PRODUK</td>					
</tr>
</table>


			<table class="table-shopping-cart">
				<tr class="table-head">
					<th class="column-1"			>GAMBAR</th>
					<th class="column-2"			>PRODUK</th>
					<th class="column-3"			>HARGA</th>
					<th class="column-4 p-l-70"		>JUMLAH</th>
					<th class="column-5" width="15%">SUB TOTAL</th>
					<th class="column-6" width="20%">ACTION</th>
				</tr>

				<!-- looping data keranjang -->
				<?php 
				//echo "<pre>";
				//print_r ($keranjang);
				//echo "</pre>";

				$berat_total = 0;
				foreach($keranjang as $keranjang) {
					//ambil data produk
					$id_produk = $keranjang['id'];
					$produk    = $this->produk_model->detail($id_produk);
					$berat_subtotal = $keranjang['weight']*$keranjang['qty'];
					$berat_total += $berat_subtotal;

					
			//form update
					echo form_open(base_url('belanja/update_cart/' .$keranjang['rowid']));

				?>

				<tr class="table-row">
					<td class="column-1">
						<div class="cart-img-product b-rad-4 o-f-hidden">
							<img src="<?php echo base_url('assets/upload/image/thumbs/' .$produk->gambar) ?>" 
							alt="<?php echo $keranjang['name'] ?>">
						</div>
					</td>
					<td class="column-2"><?php echo $keranjang['name'] ?></td>
					<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
					<td class="column-4">
						<div class="flex-w bo5 of-hidden w-size17">
							<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
								<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
							</button>

							<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

							<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
								<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
							</button>
						</div>
					</td>
					<td class="column-5">Rp. 
						<?php  
						$sub_total = $keranjang['price'] * $keranjang['qty'];
						echo number_format($sub_total,'0',',','.');
						?>
					</td>
					<td>
						<button type="submit" name="update" class="btn btn-success btn-sm">
							<i class="fa fa-edit"></i>Update
						</button>

						<a href="<?php echo base_url('belanja/hapus/' .$keranjang['rowid']) ?>"  
						  class="btn btn-warning btn-sm">
							<i class="fa fa-trash-o"></i>Hapus
						</a>
					</td>
				</tr>

				<?php 
				//form close
				echo form_close();
				//end looping
				}
				?>
				<tr class="table-row bg-info" style="font-weight: bold; color;white !important;">
					<td colspan="4" class="column-1">Total Belanja</td>
					<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
				</tr>

			</table>
			<br>



<!--pengiriman-->


<table class="table">
<tr class="table-row bg-info" style="font-weight: bold; color;white !important;">
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

							<select class="selection-1" name="kabupaten" id="kabupaten"><select></td>			
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Ekpedisi</td>
							<td><select class="selection-1" name="service" id="service" ><select></td>
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

<table class="table">
<tr class="table-row bg-info" style="font-weight: bold; color;white !important;">
			<td colspan="4" class="column-1">BIAYA PENGIRIMAN</td>
			<td colspan="2" class="column-2" id="ongkir1"></td>
</tr>

<tr class="table-row bg-info" style="font-weight: bold; color;white !important;">
			<td colspan="4" class="column-1">TOTAL BELANJA</td>
			<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
</tr>

<tr class="table-row bg-info" style="font-weight: bold; color;white !important;">
			<td colspan="4" class="column-1">TOTAL PEMBAYARAN</td>
			<td colspan="2" class="column-2" id="total_pembayaran"></td>
</tr>
</table>




<!--ONGKIR-->

		<script>
		$('document').ready(function(){
			var total_belanja = <?= $this->cart->total() ?>;
			var harga = <?= $produk->harga ?>;
			var berat = <?= $berat_total ?>;
			var ongkir = 0;
			$("#provinsi").on('change', function(){
				$("#kabupaten").empty();
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

			$("#kabupaten").on('change',function(){
				$("#ekpedisi").empty();
				$("#estimasi").empty();
				$("#ongkir").empty();
				var id_city = $(this).val();
				$.ajax({
					url : "<?= site_url('belanja/getcost')?>",
					type : 'GET',
					data : {
						'origin': 209,
						'destination' : id_city,
						'weight' : berat,
						'courier' : 'jne'

					},
					dataType : 'json',
					success : function(data){
					var parse = JSON.parse(data);
					// console.log(parse.rajaongkir.results[0].costs);
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
					var estimasi = $('option:selected',this).attr('etd');
					console.log(estimasi);
					ongkir = parseInt($(this).val());
					$("#ongkir").val(ongkir);
					document.getElementById('ongkir1').innerHTML=new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(ongkir);
					$("#estimasi").val(estimasi+"hari");
					var total_pembayaran = total_belanja+ongkir;
					document.getElementById('total_pembayaran').innerHTML=new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total_pembayaran);


			});

		});
		</script>
<!--ONGKIR-->

		

	

</section>
