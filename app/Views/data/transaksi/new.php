<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- Basic Card Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Isikan form dibawah</h6>
	</div>
	<form action="/transaksi/create" method="post">
		<div class="card-body">
			<?= csrf_field(); ?>
			<div class="form-group">
				<label>Tanggal Tranasksi</label>
				<input type="text" class="form-control <?= $validation->hasError('tgl_transaksi') ? 'is-invalid' : '' ?>" name="tgl_transaksi" value="<?= date('Y-m-d') ?>" readonly placeholder="Tanggal Transaksi">
				<div class="invalid-feedback">
					<?= $validation->getError('tgl_transaksi') ?>
				</div>
			</div>
			<div class="form-group">
				<label>Nama Pembeli</label>
				<input type="text" class="form-control <?= $validation->hasError('nama_pembeli') ? 'is-invalid' : '' ?>" name="nama_pembeli" value="<?= old('nama_pembeli'); ?>" placeholder="Nama Pembeli">
				<div class="invalid-feedback">
					<?= $validation->getError('nama_pembeli') ?>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Tambah</button>
			<a href="/transaksi" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<?= $this->endSection() ?>