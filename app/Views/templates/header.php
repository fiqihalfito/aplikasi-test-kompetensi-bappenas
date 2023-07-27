<div class="h-16 flex items-center justify-between md:justify-end md:px-8 ">

    <button class="md:hidden inline px-4 py-1 border rounded-md shadow" id="sidebar_open_button">
        Menu
    </button>

    <div class="flex gap-x-2 items-center">
        <!-- avatar -->
        <div class=" h-8 w-8 rounded-full bg-slate-400">

        </div>
        <h1 class="font-semibold"><?= session()->get('nama'); ?></h1>
        <a href="/logout">
            <button class="py-1 px-3 border shadow rounded-md text-xs hover:bg-red-600 hover:text-white font-semibold">
                Logout
            </button>
        </a>
    </div>
</div>