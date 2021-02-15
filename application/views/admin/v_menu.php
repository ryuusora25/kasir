<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php $this->load->view("admin/include/head.php") ?>
		<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
	</head>

	<body class="sb-nav-fixed">
		<?php $this->load->view("admin/include/navbar.php") ?><?php $this->load->view("admin/include/sidebar.php") ?>
		<div id="layoutSidenav_content">
			<main>
				<!--isi-->
				<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tabel Menu Makanan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Menu</th>
										<th>Harga</th>
										<th>Jenis Menu</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Nama Menu</th>
										<th>Harga</th>
										<th>Jenis Menu</th>
										<th>Aksi</th>
									</tr>
								<tfoot>
								<tbody>
								
								<?php foreach ($menus as $menu):
										if($menu->tipe=='1'){
											$tipe='Sego-segoan';
										}elseif($menu->tipe=='2'){
											$tipe='Jajan-jajanan';
										}
									?>
									<tr>
										<td><?php echo $menu->nama_menu ?></td>
										<td><?php echo $menu->harga_menu ?></td>
										<td><?php echo $tipe ?></td>
										<td>
										<a class="btn btn-success" href="<?php echo base_url('admin/menus/edit/'.$menu->id_menu) ?>" role="button">Edit</a>
										<a href="<?php echo base_url('admin/kasirs/delete/'.$menu->id_menu) ?>" 
											onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger"><i class="fas fa-trash"></i>
													Hapus</a>
										</td>
									</tr>
								<?php endforeach; ?>
								
								</tbody>

							</table>
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
