<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- Basic Card Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Isikan form dibawah</h6>
	</div>
	<form action="/detil/update/<?= $detil[0]['kode_detil']; ?>" method="post">
		<div class="card-body">
			<input type="hidden" name="_method" value="PUT">
			<?= csrf_field(); ?>
			<div class="row">
				<div class="form-group col-md-6">
					<label>Pilih Kode Transaksi</label>
					<select class="form-control select2bs4 <?= $validation->hasError('kode_transaksi') ? 'is-invalid' : '' ?>" style="width: 100%;" name="kode_transaksi">
						<option selected disabled>Cari Kode Transaksi</option>
						<?php foreach($transaksi as $transaksi) : ?>
							<option value="<?= $transaksi['kode_transaksi'] ?>">
								<?= $transaksi['kode_transaksi'] ?> - <?= $transaksi['nama_pembeli'] ?>
							</option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
						<?= $validation->getError('kode_transaksi') ?>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label>Pilih Obat</label>
					<select class="form-control select2bs4 pilih-obat <?= $validation->hasError('kode_obat') ? 'is-invalid' : '' ?>" style="width: 100%;" name="kode_obat">
						<option selected disabled>Cari Obat</option>
						<?php foreach($obat as $obat) : ?>
							<option value="<?= $obat['kode_obat'] ?>" data-harga="<?= $obat['harga'] ?>">
								<?= $obat['nama_obat'] ?> - Rp. <?= $obat['harga'] ?>		
							</option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
						<?= $validation->getError('kode_obat') ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>Subtotal</label>
					<input type="number" name="sub_total" class="form-control jml-obat <?= $validation->hasError('sub_total') ? 'is-invalid' : '' ?>" id="sub_total" value="0">
					<div class="invalid-feedback">
						<?= $validation->getError('sub_total') ?>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label>Total</label>
					<input type="text" name="total" class="form-control total-harga <?= $validation->hasError('total') ? 'is-invalid' : '' ?>" id="total" readonly>
					<div class="invalid-feedback">
						<?= $validation->getError('total') ?>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Update</button>
			<a href="/detil" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<?= $this->endSection() ?>