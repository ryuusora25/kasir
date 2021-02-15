<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/include/head.php") ?>
	
</head>

<body class="sb-nav-fixed">
	<?php $this->load->view("admin/include/navbar.php") ?><?php $this->load->view("admin/include/sidebar.php") ?>
	<div id="layoutSidenav_content">
		<main>
			<!--isi-->
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table mr-1"></i>
					Laporan
				</div>
				<div class="card-body">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">Laporan Hari ini</a></li>
							<li><a href="#tabs-2">Laporan Bulan ini</a></li>
							<li><a href="#tabs-3">Laporan Tahun ini</a></li>
							<li><a href="#tabs-4">Golek Laporan(jek sementara)</a></li>
						</ul>
						<div id="tabs-4">
							<div class="table-responsive">

								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Kode Transaksi</th>
											<th>Jenis Pembayaran</th>
											<th>Pengutang</th>
											<th>Total</th>
											<th>Tanggal Transaksi</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($bayars as $a):
										if($a->jenis_bayar=='1'){
											$jenis_bayar="Cash";
											$pengutang='-';
										}elseif($a->jenis_bayar=='2'){
											$jenis_bayar="Utang";
											$pengutang=$a->pengutang;
										}
									?>
										<tr>
											<td><?php echo $a->id_trans ?></td>
											<td><?php echo $jenis_bayar ?></td>
											<td><?php echo $pengutang ?></td>
											<td><?php echo 'Rp. '.number_format($a->total); ?></td>
											<td>
												<?php echo date('d-m-Y', strtotime($a->tanggal)); ?>
											</td>
										</tr>
										<?php endforeach; ?>
										<tr>
											<th scope="row">Total Penjualan Kabeh</th>
											<th colspan="3">
												<center>
													<?php
											 $q_t=$this->db->select_sum('total')->from('transaksi')->get()->result();
											 foreach($q_t as $ss){
												echo 'Rp. '.number_format($ss->total); 
											 }
										
										?>
												</center>
											</th>
											<td><?php echo date("d-m-Y"); ?></td>
										</tr>

									</tbody>

								</table>
							</div>
						</div>

						<div id="tabs-1">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Kode Transaksi</th>
											<th>Jenis Pembayaran</th>
											<th>Pengutang</th>
											<th>Total</th>
											<th>Tanggal Transaksi</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($pertg as $a):
										if($a->jenis_bayar=='1'){
											$jenis_bayar="Cash";
											$pengutang='-';
										}elseif($a->jenis_bayar=='2'){
											$jenis_bayar="Utang";
											$pengutang=$a->pengutang;
										}
									?>
										<tr>
											<td><?php echo $a->id_trans ?></td>
											<td><?php echo $jenis_bayar ?></td>
											<td><?php echo $pengutang ?></td>
											<td><?php echo 'Rp. '.number_format($a->total); ?></td>
											<td>
											<?php echo date('d-m-Y', strtotime($a->tanggal)); ?>
											</td>
										</tr>
										<?php endforeach; ?>
										<tr>
											<th scope="row">Total Penjualan Dino Iki</th>
											<th colspan="3">
												<center>
													<?php
											 $q_t=$this->db->select_sum('total')->from('transaksi')->where('tanggal',date('Y-m-d'))->get()->result();
											 foreach($q_t as $ss){
												echo 'Rp. '.number_format($ss->total); 
											 }
										
										?>
												</center>
											</th>
											<td><?php echo date("d-m-Y"); ?></td>
										</tr>

									</tbody>

								</table>
							</div>
						</div>


						<div id="tabs-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Kode Transaksi</th>
											<th>Jenis Pembayaran</th>
											<th>Pengutang</th>
											<th>Total</th>
											<th>Tanggal Transaksi</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($bl as $a):
										if($a->jenis_bayar=='1'){
											$jenis_bayar="Cash";
											$pengutang='-';
										}elseif($a->jenis_bayar=='2'){
											$jenis_bayar="Utang";
											$pengutang=$a->pengutang;
										}
									?>
										<tr>
											<td><?php echo $a->id_trans ?></td>
											<td><?php echo $jenis_bayar ?></td>
											<td><?php echo $pengutang ?></td>
											<td><?php echo 'Rp. '.number_format($a->total); ?></td>
											<td>
											<?php echo date('d-m-Y', strtotime($a->tanggal)); ?>
											</td>
										</tr>
										<?php endforeach; ?>
										<tr>
											<th scope="row">Total Penjualan Ulan iki</th>
											<th colspan="3">
												<center>
													<?php
											 $q_t=$this->db->select_sum('total')->from('transaksi')->where('month(tanggal)',date('m'))->get()->result();
											 foreach($q_t as $ss){
												echo 'Rp. '.number_format($ss->total); 
											 }
										
										?>
												</center>
											</th>
											<td><?php echo date("d-m-Y"); ?></td>
										</tr>

									</tbody>

								</table>
							</div>
						</div>

						<div id="tabs-3">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Kode Transaksi</th>
											<th>Jenis Pembayaran</th>
											<th>Pengutang</th>
											<th>Total</th>
											<th>Tanggal Transaksi</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($th as $a):
										if($a->jenis_bayar=='1'){
											$jenis_bayar="Cash";
											$pengutang='-';
										}elseif($a->jenis_bayar=='2'){
											$jenis_bayar="Utang";
											$pengutang=$a->pengutang;
										}
									?>
										<tr>
											<td><?php echo $a->id_trans ?></td>
											<td><?php echo $jenis_bayar ?></td>
											<td><?php echo $pengutang ?></td>
											<td><?php echo 'Rp. '.number_format($a->total); ?></td>
											<td>
											<?php echo date('d-m-Y', strtotime($a->tanggal)); ?>
											</td>
										</tr>
										<?php endforeach; ?>
										<tr>
											<th scope="row">Total Penjualan Taun iki</th>
											<th colspan="3">
												<center>
													<?php
											 $q_t=$this->db->select_sum('total')->from('transaksi')->where('year(tanggal)',date('Y'))->get()->result();
											 foreach($q_t as $ss){
												echo 'Rp. '.number_format($ss->total); 
											 }
										
										?>
												</center>
											</th>
											<td><?php echo date("d-m-Y"); ?></td>
										</tr>

									</tbody>

								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</main>
		<!--end-->
		<?php $this->load->view("admin/include/footer.php") ?>
		<?php $this->load->view("admin/include/modal.php") ?>
	</div>
	</div><?php $this->load->view("admin/include/js.php") ?></body>

</html>
