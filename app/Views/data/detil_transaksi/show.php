<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
<!-- Basic Card Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
	</div>
	<div class="card-body">
		<ul class="list-group">
			<li class="list-group-item"><strong>Kode Detil</strong> - <?= $detil[0]['kode_detil']; ?></li>
			<li class="list-group-item"><strong>Kode Transaksi</strong> - <?= $detil[0]['kode_transaksi']; ?></li>
			<ul class="list-group ml-5">
				<li class="list-group-item"><strong>Id User</strong> - <?= $detil[0]['id_user']; ?></li>
				<li class="list-group-item"><strong>Nama Pembeli</strong> - <?= $detil[0]['nama_pembeli']; ?></li>
				<li class="list-group-item"><strong>Tanggal Transaksi</strong> - <?= $detil[0]['tgl_transaksi']; ?></li>
			</ul>
			<li class="list-group-item"><strong>Kode Obat</strong> - <?= $detil[0]['kode_obat']; ?></li>
			<ul class="list-group ml-5">
				<li class="list-group-item"><strong>Kode Suplier</strong> - <?= $detil[0]['kode_suplier']; ?></li>
				<li class="list-group-item"><strong>Nama Obat</strong> - <?= $detil[0]['nama_obat']; ?></li>
				<li class="list-group-item"><strong>Produsen</strong> - <?= $detil[0]['produsen']; ?></li>
				<li class="list-group-item"><strong>Harga</strong> - <?= $detil[0]['harga']; ?></li>
				<li class="list-group-item"><strong>Stok</strong> - <?= $detil[0]['jml_stok']; ?></li>
				<li class="list-group-item">
					<strong>Icon</strong> - <img src="/img/obat/<?= $detil[0]['icon']; ?>" width="200" height="200">
				</li>
			</ul>
			<li class="list-group-item"><strong>Subtotal</strong> - <?= $detil[0]['sub_total']; ?></li>
			<li class="list-group-item"><strong>Total</strong> - Rp. <?= $detil[0]['total']; ?></li>
		</ul>
	</div>
	<div class="card-footer">
		<a href="/detil" class="btn btn-secondary">Kembali</a>
	</div>
</div>
<?= $this->endSection() ?>