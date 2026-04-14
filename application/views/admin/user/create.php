<!-- Header -->
<div class="col-12">
    <div class="card mb-4">
        <div class="user-profile-header-banner">
            <img src="<?= $assets_admin ?>img/pages/profile-banner.png" alt="Banner image" class="rounded-top" />
        </div>
        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                <img src="<?= $assets_admin ?>img/avatars/profile.png" id="preview-img" alt="user image"
                    class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
            </div>
            <div class="flex-grow-1 mt-3 mt-sm-5">
                <div
                    class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                    <div class="user-profile-info">
                        <h4>Farah Salsa Nabila</h4>
                        <ul
                            class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                            <li class="list-inline-item"><i class="ti ti-adjustments-alt"></i> User</li>
                            <li class="list-inline-item"><i class="ti ti-map-pin"></i> Arjawinangun</li>
                            <li class="list-inline-item"><i class="ti ti-calendar"></i> 03 April 2003</li>
                        </ul>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-success">
                        <i class="ti ti-user-check me-1"></i>active
                    </a>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('user/store') ?>" enctype="multipart/form-data">
            <div class="card-body border-top">
                <h5>01. Detail User</h5>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-name">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Farah" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-name">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-name">Foto</label>
                        <input type="file" name="foto" class="form-control" onchange="previewImage(event)" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-name">Alamat Lengkap</label>
                        <textarea type="text" name="alamat" class="form-control" placeholder="Arjawinangun"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <h5>02. Account Information</h5>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Level User</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="role"
                            aria-label="Default select example">
                            <option disabled selected hidden>Select</option>
                            <option value="1">01 - Admin</option>
                            <option value="2">02 - User</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-name">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-name">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" class="form-control" id="basic-default-password32"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="basic-default-password" />
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                        class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('user') ?>" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>