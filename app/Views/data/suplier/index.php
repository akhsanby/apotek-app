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
						<th>Nama Suplier</th>
						<th>Alamat</th>
						<th>Kota</th>
						<th>Telp</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($suplier as $suplier) : ?>
						<tr>
							<td><?= $suplier['nama_suplier']; ?></td>
							<td><?= $suplier['alamat']; ?></td>
							<td><?= $suplier['kota']; ?></td>
							<td><?= $suplier['telp']; ?></td>
							<td>
								<a href="/suplier/edit/<?= $suplier['kode_suplier'] ?>" class="btn btn-success">edit</a>
								<form action="/suplier/delete/<?= $suplier['kode_suplier'] ?>" method="post" class="d-inline">
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