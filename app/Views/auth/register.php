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
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                            </div>
                            <form class="user" action="/registered" method="post">
                                <div class="form-group">
                                    <input type="username" name="username" class="form-control form-control-user <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Masukkan Username">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" name="password" placeholder="Password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password') ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user <?= $validation->hasError('password1') ? 'is-invalid' : '' ?>" name="password1" placeholder="Re-type Password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password1') ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/login">Sudah ada akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>

