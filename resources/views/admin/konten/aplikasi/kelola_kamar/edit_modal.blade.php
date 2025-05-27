<div class="modal fade" id="editKamarModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editKamarForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" name="nama_kamar" id="edit_nama_kamar" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control" name="gender" id="edit_gender" required>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                            <option value="campur">Campur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="edit_harga" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar (Max 20MB)</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                        <img id="current_gambar" src="" alt="Current Image" class="mt-2" style="max-height: 100px; display: none;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>