<div class="w-96 h-screen hidden md:block">

    <!-- Logo -->
    <div class="h-16 flex justify-center items-center">
        <h1 class="text-2xl text-center font-semibold">Sistem Repositori</h1>
    </div>

    <div class="flex flex-col gap-y-2 px-4">
        <?php foreach (LINKS as $link) : ?>

            <a href=<?= $link['url']; ?> class=" p-4 border shadow rounded-lg font-semibold hover:bg-slate-200 ">
                <?= $link['title']; ?>
            </a>
        <?php endforeach ?>
    </div>


</div>