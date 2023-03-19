<form>
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label">Nama Outlet</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Outlet">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">No Telephone</label>
            <input type="text" name="tlp" id="tlp" class="form-control" placeholder="No Telephone">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Maps</label>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7933.501812947159!2d106.81934498055088!3d-6.169392930026549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x38a5c18685b8edf7!2sKota%20Kasablanka!5e0!3m2!1sen!2sid!4v1647739592353!5m2!1sen!2sid"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onclick="store()">Simpan</button>
        </div>
    </div>
</form>