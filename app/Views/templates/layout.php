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

<body class="min-h-screen font-inter text-slate-700">

    <div class="flex">
        <?= $this->include('templates/sidebar'); ?>

        <div class="flex-grow px-4 md:pl-0 md:pr-4 md:container relative">
            <?= $this->include('templates/header'); ?>
            <?= $this->include('templates/sidebar_mobile'); ?>


            <div class="container px-4 py-6 border rounded-md shadow mb-4">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>

</body>

</html>