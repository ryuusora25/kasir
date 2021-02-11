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
				<div class="container-fluid">
					<h1 class="mt-4"> Menu</h1>
					<!-- Isi -->
					<div class="card mb-4">
						<div class="card-header">

							Menu
						</div>
						
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>Nama Menu</td>
										<td>Harga</td>
										<td>Jenis Menu</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($menus as $menu): ?>
									<tr>
										<td><?php echo $menu->nama_menu ?></td>
										<td><?php echo $menu->harga_menu ?></td>
										<td><?php echo $menu->tipe ?></td>
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
