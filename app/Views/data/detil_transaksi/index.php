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
					<th>Kode Transaksi - Nama Pembeli</th>
					<th>Kode Obat</th>
					<th>Subtotal</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detil as $detil) : ?>
					<tr>
						<td><?= $detil['kode_transaksi']; ?> - <?= $detil['nama_pembeli']; ?></td>
						<td><?= $detil['kode_obat']; ?></td>
						<td><?= $detil['sub_total']; ?></td>
						<td>Rp. <?= $detil['total']; ?></td>
						<td>
							<a class="btn btn-info" href="/detil/show/<?= $detil['kode_detil']; ?>">detail</a>
							<a class="btn btn-success" href="/detil/edit/<?= $detil['kode_detil']; ?>">edit</a>
							<form action="/detil/delete/<?= $detil['kode_detil']; ?>" method="post" class="d-inline">
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