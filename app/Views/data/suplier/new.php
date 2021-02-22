<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- Basic Card Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Isikan form dibawah</h6>
	</div>
	<form action="/suplier/create" method="post">
		<div class="card-body">
			<?= csrf_field(); ?>
			<div class="form-group">
				<label>Nama Suplier</label>
				<input type="text" class="form-control <?= $validation->hasError('nama_suplier') ? 'is-invalid' : '' ?>" name="nama_suplier" value="<?= old('nama_suplier'); ?>" placeholder="Nama Suplier">
				<div class="invalid-feedback">
					<?= $validation->getError('nama_suplier') ?>
				</div>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>" name="alamat" value="<?= old('alamat'); ?>" placeholder="Alamat">
				<div class="invalid-feedback">
					<?= $validation->getError('alamat') ?>
				</div>
			</div>
			<div class="form-group">
				<label>Kota</label>
				<input type="text" class="form-control <?= $validation->hasError('kota') ? 'is-invalid' : '' ?>" name="kota" value="<?= old('kota'); ?>" placeholder="Kota">
				<div class="invalid-feedback">
					<?= $validation->getError('kota') ?>
				</div>
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="text" class="form-control <?= $validation->hasError('telp') ? 'is-invalid' : '' ?>" name="telp" value="<?= old('telp'); ?>" placeholder="Telepon">
				<div class="invalid-feedback">
					<?= $validation->getError('telp') ?>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Tambah</button>
			<a href="/suplier" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<?= $this->endSection() ?>