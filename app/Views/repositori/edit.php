<?= $this->extend('templates/layout'); ?>

<?= $this->section('content'); ?>

<!-- Title heading -->
<?= view_cell('ContentTitle::render', ['title' => 'Edit Repositori']); ?>

<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="text-red-600">Periksa Form!</h4>
        </hr />
        <p class="text-red-600"><?php echo session()->getFlashdata('error'); ?></p>
    </div>
<?php endif; ?>

<form method="post" action="/repositori/update" enctype="multipart/form-data" class="space-y-4">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $repo['id']; ?>">
    <div class="space-y-2 flex flex-col items-start">
        <label for="judul" class="">Judul File</label>
        <input type="text" id="judul" name="title" class="w-80 border-2 rounded py-1 px-2" value="<?= $repo['title'] ?>" required>
    </div>
    <div class="space-y-2 flex flex-col items-start">
        <label for="repo_file" class="">Upload File</label>
        <input type="file" id="repo_file" name="repo_file" class="w-80 border-2 rounded py-1 px-2" value="<?= $repo['filename']; ?>">
    </div>
    <button type="submit" class="px-4 py-1 bg-sky-400 rounded-md text-white hover:bg-sky-300">Submit</button>
</form>


<?= $this->endSection(); ?>