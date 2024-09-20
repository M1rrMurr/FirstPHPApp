<!DOCTYPE html>
<html lang="en">
<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/header.php') ?>

<body class="h-full">
    <div class="min-h-full">

        <main class="mx-auto max-w-7xl px-8 py-4">
            <form method="post">
                <label class="mb-6 block text-lg font-bold" for="body">Description</label>
                <div>
                    <textarea class="w-full border-solid border-2 p-2 border-gray-200 border-rounded rounded-md" id="body" name="body" placeholder="Create some notes..."><?= isset($errors["body"]) ? $_POST["body"] : "" ?></textarea>

                </div>
                <p class="text-sm text-red-500 mt-3"><?= $errors["body"] ?? '' ?></p>
                <p class="flex items-center justify-end">
                    <button class="bg-blue-500 border-rounded rounded-md text-gray-100 px-3 py-1 mt-6 hover:bg-blue-600 hover:text-white-50 text-lg transition-all font-semibold" type="submit">Create</button>
                </p>
            </form>

        </main>
    </div>
</body>

</html>