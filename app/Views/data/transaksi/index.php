<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		<?php if (session()->getFlashdata('created')) : ?>
		<div class="alert alert-success" role="alert">
			<?= session()->getFlashdata('created'); ?>
		</div>
		<?php elseif (session()->getFlashdata('deleted')) : ?>
		<div class="alert alert-success" role="alert">
			<?= session()->getFlashdata('deleted'); ?>
		</div>
	<?php endif; ?>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Kode Transaksi</th>
						<th>Tanggal</th>
						<th>Admin</th>
						<th>Nama Pembeli</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($transaksi as $transaksi) : ?>
						<tr>
							<td><?= $transaksi['kode_transaksi']; ?></td>
							<td><?= $transaksi['tgl_transaksi']; ?></td>
							<td><?= $transaksi['username']; ?></td>
							<td><?= $transaksi['nama_pembeli']; ?></td>
							<td>
								<form action="/transaksi/delete/<?= $transaksi['kode_transaksi']; ?>" method="post" class="d-inline">
									<input type="hidden" name="_method" value="DELETE">
									<?= csrf_field(); ?>
									<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">delete</button>
								</form>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?= $this->endSection() ?>