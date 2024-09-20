<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<?php
require basePath('views/partials/head.php');

?>

<body class="h-full">
    <div class="min-h-full">
        <?php require basePath('views/partials/nav.php') ?>
        <?php require basePath('views/partials/header.php') ?>
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <p class="mb-6"><?= htmlspecialchars($note["body"]) ?></p>
            <a href="/notes" class="text-lg text-blue-500 hover:underline">back to homepage</a>
            <div class="flex mt-6 space-x-5">
                <a class="text-white text-md bg-slate-300 font-semibold  rounded-md py-1 px-3 hover:bg-slate-400 transition-all" href="/note/edit?id=<?= $note["id"] ?>">Edit</a>

                <form method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="hidden" name="id" value="<?= $note["id"] ?>" />
                    <button class=" text-white bg-red-500 font-semibold rounded-md py-1 px-3 hover:bg-red-600 transition-all">
                        Delete
                    </button>


                </form>
            </div>
        </main>
    </div>
</body>

</html>