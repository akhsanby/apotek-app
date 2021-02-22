<?= $this->extend('templates/auth') ?>
<?= $this->section('content') ?>
<!-- Outer Row -->
<div class="row justify-content-center">

	<div class="col-xl-5 col-lg-8 col-md">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Login!</h1>
							</div>
							<!-- /.login-logo -->
							<?php if (session()->getFlashdata('pesan')) : ?>
							<div class="alert alert-success" role="alert">
								<?= session()->getFlashdata('pesan'); ?>
							</div>
							<?php elseif (session()->getFlashdata('kesalahan')) : ?>
							<div class="alert alert-danger" role="alert">
								<?= session()->getFlashdata('kesalahan'); ?>
							</div>
							<?php elseif (session()->has('logout')) : ?>
							<div class="alert alert-success" role="alert">
								<?= session()->get('logout'); ?>
							</div>
						<?php endif; ?>
						<form class="user" action="/loged" method="post">
							<div class="form-group">
								<input type="username" name="username" class="form-control form-control-user <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Masukkan Username">
								<div class="invalid-feedback">
									<?= $validation->getError('username') ?>
								</div>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control form-control-user <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password">
								<div class="invalid-feedback">
									<?= $validation->getError('password') ?>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Login
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="/register">Daftar Akun!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

</div>
<?= $this->endSection() ?>