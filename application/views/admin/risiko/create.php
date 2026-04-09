<div class="col-md-12 mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">Tambah Data</h5>
        <div class="card-body">
            <form class="browser-default-validation row">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Name</label>
                    <input type="text" class="form-control" placeholder="John Doe" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-country">Country</label>
                    <select class="form-select" required>
                        <option value="">Select Country</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                        <option value="france">France</option>
                        <option value="australia">Australia</option>
                        <option value="spain">Spain</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-dob">DOB</label>
                    <input type="text" class="form-control flatpickr-validation"  required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-upload-file">Profile pic</label>
                    <input type="file" class="form-control" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="d-block form-label">Gender</label>
                    <div class="form-check mb-2">
                        <input type="radio" name="basic-default-radio"
                            class="form-check-input" required />
                        <label class="form-check-label" for="basic-default-radio-male">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="basic-default-radio"
                            class="form-check-input" required />
                        <label class="form-check-label" for="basic-default-radio-female">Female</label>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-bio">Bio</label>
                    <textarea class="form-control" name="basic-default-bio" rows="3"
                        required></textarea>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>