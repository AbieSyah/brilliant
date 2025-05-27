<div class="modal fade" id="createReviewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="createReviewForm" action="{{ route('admin.konten.website.review.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Detail Review</label>
                        <textarea class="form-control" name="detail_review" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rating (1-5)</label>
                        <input type="number" class="form-control" name="rating" min="1" max="5" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Profil</label>
                        <input type="file" class="form-control" name="gambar_profil" accept="image/*" onchange="previewImage(this, 'createReviewPreview')">
                        <img id="createReviewPreview" class="mt-2" style="max-width: 200px; display: none;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>