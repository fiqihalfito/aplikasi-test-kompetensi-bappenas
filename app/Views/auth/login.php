<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aplikasi test kompetensi Bappenas</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="h-screen font-inter text-slate-700">

    <div class="h-full flex items-center justify-center">
        <div class="w-full mx-4 md:mx-0 md:w-96 h-96 border shadow rounded-md p-6">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="p-4 bg-red-600 text-white rounded-md mb-4">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="/login/proses" method="post">
                <?= csrf_field(); ?>
                <h1 class="text-center text-3xl font-semibold mb-6">Login</h1>

                <div class="space-y-3">
                    <div class="space-y-2">
                        <label for="email" class="font-semibold">Email</label>
                        <input type="email" id="email" name="email" placeholder="email..." class="w-full px-3 py-2 border shadow rounded-md" required>
                    </div>
                    <div class="space-y-2">
                        <label for="password" class="font-semibold">Password</label>
                        <input type="password" id="password" name="password" placeholder="password..." class="w-full px-3 py-2 border shadow rounded-md" required>
                    </div>
                </div>

                <button type="submit" class="mt-4 w-full py-2 rounded-md bg-slate-800 text-white hover:bg-slate-800/80">Login</button>
            </form>
        </div>
    </div>



</body>

</html>