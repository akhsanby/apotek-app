<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		<?php if (session()->getFlashdata('created')) : ?>
		<div class="alert alert-success" role="alert">
			<?= session()->getFlashdata('created'); ?>
		</div>
		<?php elseif (session()->getFlashdata('updated')) : ?>
		<div class="alert alert-success" role="alert">
			<?= session()->getFlashdata('updated'); ?>
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
					<th>Icon</th>
					<th>Kode Suplier</th>
					<th>Nama Obat</th>
					<th>Produsen</th>
					<th>Harga</th>
					<th>Stok</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($obat as $obat) : ?>
					<tr>
						<td>
							<img width="70" height="70" src="/img/obat/<?= $obat['icon']; ?>">
						</td>
						<td><?= $obat['kode_suplier']; ?></td>
						<td><?= $obat['nama_obat']; ?></td>
						<td><?= $obat['produsen']; ?></td>
						<td>Rp. <?= $obat['harga']; ?></td>
						<td><?= $obat['jml_stok']; ?></td>
						<td>
							<a href="/obat/edit/<?= $obat['kode_obat'] ?>" class="btn btn-success">edit</a>
							<form action="/obat/delete/<?= $obat['kode_obat'] ?>" method="post" class="d-inline">
								<input type="hidden" name="_method" value="DELETE" />
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