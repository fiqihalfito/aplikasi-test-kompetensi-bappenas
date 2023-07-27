<?= $this->extend('templates/layout'); ?>

<?= $this->section('content'); ?>

<!-- Title heading -->
<?= view_cell('ContentTitle::render', ['title' => 'Repositori']); ?>

<?php if (!empty(session()->getFlashdata('success'))) : ?>
    <div class="p-4 bg-lime-400 rounded-md mb-4">
        <?php echo session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<a href="/repositori/create">
    <button class="py-2 px-4 mb-4 bg-sky-400 rounded-md font-semibold text-white hover:bg-sky-300">
        Tambah Repositori
    </button>
</a>

<div class="rounded-lg overflow-hidden hidden md:block">
    <table class="w-full text-left border-collapse border border-slate-50 ">
        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Judul file</th>
                <th class="px-6 py-3">Nama file</th>
                <th class="px-6 py-3">Tanggal input</th>
                <th class="px-6 py-3">aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($repositories as $item) : ?>
                <tr class="bg-slate-200 hover:bg-slate-300">
                    <td class="px-6 py-3"><?= $i++; ?></td>
                    <td class="px-6 py-3 break-wordsx"><?= $item['title']; ?></td>
                    <td class="px-6 py-3 truncate"><?= $item['filename']; ?></td>
                    <td class="px-6 py-3"><?= (new DateTime($item['created_at']))->format('d F Y H:i') ?></td>
                    <td class="px-6 py-3 flex-nowrapx flex gap-x-2">

                        <a href="/repositori/download/<?= $item['filename']; ?>" class="py-1 px-3 bg-lime-500 text-sm rounded-md hover:bg-lime-400">Unduh</a>
                        <a href="/repositori/edit/<?= $item['id']; ?>" class="py-1 px-3 bg-amber-400 text-sm rounded-md hover:bg-amber-300">Edit</a>
                        <a href="/repositori/delete/<?= $item['id']; ?>" class="py-1 px-3 bg-red-600 text-sm text-white rounded-md hover:bg-red-500">Hapus</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="space-y-4 md:hidden">
    <?php foreach ($repositories as $item) : ?>
        <div class="p-4 grid grid-cols-2 justify-betweenx items-center w-full border shadow rounded-md">
            <div>
                <h1 class="font-semibold"><?= $item['title']; ?></h1>
                <p class="text-xs"><?= (new DateTime($item['created_at']))->format('d F Y H:i') ?></p>
            </div>
            <div class="flex flex-col gap-y-2">
                <a href="/repositori/download/<?= $item['filename']; ?>" class="py-1 px-3 bg-lime-500 text-sm rounded-md hover:bg-lime-400">Unduh</a>
                <a href="/repositori/edit/<?= $item['id']; ?>" class="py-1 px-3 bg-amber-400 text-sm rounded-md hover:bg-amber-300">Edit</a>
                <a href="/repositori/delete/<?= $item['id']; ?>" class="py-1 px-3 bg-red-600 text-sm text-white rounded-md hover:bg-red-500">Hapus</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<?= $this->endSection(); ?>