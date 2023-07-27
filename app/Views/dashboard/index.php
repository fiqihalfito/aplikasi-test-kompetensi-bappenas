<?= $this->extend('templates/layout'); ?>

<?= $this->section('content'); ?>

<!-- Title heading -->
<?= view_cell('ContentTitle::render', ['title' => 'Dashboard']); ?>


<?= $this->endSection(); ?>