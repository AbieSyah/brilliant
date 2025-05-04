<div class="modal fade" id="editReviewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editReviewForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="edit_nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Detail Review</label>
                        <textarea class="form-control" name="detail_review" id="edit_detail_review" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rating (1-5)</label>
                        <input type="number" class="form-control" name="rating" id="edit_rating" min="1" max="5" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Profil</label>
                        <input type="file" class="form-control" name="gambar_profil" accept="image/*" onchange="previewImage(this, 'editReviewPreview')">
                        <img id="editReviewPreview" class="mt-2" style="max-width: 200px">
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