<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- Basic Card Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Isikan form dibawah</h6>
	</div>
	<form action="/obat/update/<?= $obat['kode_obat']; ?>" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<!-- <input type="hidden" name="_method" value="PUT"/> -->
			<?= csrf_field(); ?>
			<div class="form-group">
				<label>Kode Suplier</label>
				<?= form_dropdown('kode_suplier', $kode_suplier, $obat['kode_suplier'], ['class' => 'form-control']); ?>
			</div>
			<div class="form-group">
				<label>Nama Obat</label>
				<input type="text" class="form-control <?= $validation->hasError('nama_obat') ? 'is-invalid' : '' ?>" name="nama_obat" value="<?= (old('nama_obat')) ? old('nama_obat') : $obat['nama_obat'] ?>" placeholder="Nama Obat">
				<div class="invalid-feedback">
					<?= $validation->getError('nama_obat') ?>
				</div>
			</div>
			<div class="form-group">
				<label>Produsen</label>
				<input type="text" class="form-control <?= $validation->hasError('produsen') ? 'is-invalid' : '' ?>" name="produsen" value="<?= (old('produsen')) ? old('produsen') : $obat['produsen'] ?>" placeholder="Produsen">
				<div class="invalid-feedback">
					<?= $validation->getError('produsen') ?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>Harga</label>
					<input type="number" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>" name="harga" value="<?= (old('harga')) ? old('harga') : $obat['harga'] ?>" number placeholder="Harga">
					<div class="invalid-feedback">
						<?= $validation->getError('harga') ?>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label>Stok</label>
					<input type="number" class="form-control <?= $validation->hasError('jml_stok') ? 'is-invalid' : '' ?>" name="jml_stok" value="<?= (old('jml_stok')) ? old('jml_stok') : $obat['jml_stok'] ?>" placeholder="Stok">
					<div class="invalid-feedback">
						<?= $validation->getError('jml_stok') ?>
					</div>
				</div>
			</div>
			<img width="100" height="100" src="/img/obat/<?= $obat['icon'] ?>" class="d-inline">
			<input type="file" name="icon">
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Update</button>
			<a href="/obat" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<?= $this->endSection() ?>