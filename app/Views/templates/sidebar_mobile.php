<div class="w-screen md:w-full h-screen md:hidden block absolute top-0 -left-full bg-white transition-all" id="sidebar_mobile">

    <div class="flex justify-end p-4">
        <button class="px-4 py-1 border rounded-md shadow " id="sidebar_close_button">
            Close
        </button>
    </div>

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