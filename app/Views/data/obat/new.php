<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- Basic Card Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Isikan form dibawah</h6>
	</div>
	<form action="/obat/create" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<?= csrf_field(); ?>
			<div class="form-group">
				<label>Kode Suplier</label>
				<select name="kode_suplier" class="form-control select2bs4 <?= $validation->hasError('kode_suplier') ? 'is-invalid' : '' ?>">
					<option selected disabled>Pilih Kode Suplier</option>
					<?php foreach($suplier as $suplier) : ?>
						<option value="<?= $suplier['kode_suplier']; ?>"><?= $suplier['kode_suplier']; ?> - <?= $suplier['nama_suplier']; ?></option>
					<?php endforeach; ?>
				</select>
				<div class="invalid-feedback">
					<?= $validation->getError('kode_suplier') ?>
				</div>
			</div>
			<div class="form-group">
				<label>Nama Obat</label>
				<input type="text" class="form-control <?= $validation->hasError('nama_obat') ? 'is-invalid' : '' ?>" name="nama_obat" value="<?= old('nama_obat'); ?>" placeholder="Nama Obat">
				<div class="invalid-feedback">
					<?= $validation->getError('nama_obat') ?>
				</div>
			</div>
			<div class="form-group">
				<label>Produsen</label>
				<input type="text" class="form-control <?= $validation->hasError('produsen') ? 'is-invalid' : '' ?>" name="produsen" value="<?= old('produsen'); ?>" placeholder="Produsen">
				<div class="invalid-feedback">
					<?= $validation->getError('produsen') ?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>Harga</label>
					<input type="number" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>" name="harga" value="<?= old('harga'); ?>" placeholder="Harga">
					<div class="invalid-feedback">
						<?= $validation->getError('harga') ?>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label>Stok</label>
					<input type="number" class="form-control <?= $validation->hasError('jml_stok') ? 'is-invalid' : '' ?>" name="jml_stok" value="<?= old('jml_stok'); ?>" placeholder="Stok">
					<div class="invalid-feedback">
						<?= $validation->getError('jml_stok') ?>
					</div>
				</div>
			</div>
			<label class="d-block">Icon obat</label>
			<input type="file" name="icon" class="<?= $validation->hasError('icon') ? 'is-invalid' : '' ?>">
			<div class="invalid-feedback">
				<?= $validation->getError('icon') ?>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Tambah</button>
			<a href="/obat" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<?= $this->endSection() ?>