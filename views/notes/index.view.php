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
            <ul class="mb-6">
                <?php foreach ($notes as $note) : ?>
                    <a href="/note?id=<?php echo $note["id"] ?>" class="text-lg text-blue-500 hover:underline">
                        <?= "<li>" . htmlspecialchars($note["body"]) . "</li>" ?>
                    </a>
                <?php endforeach ?>
            </ul>

            <a href="/notes/create" class="text-lg font-semibold hover:underline">Create some notes...</a>
        </main>
    </div>
</body>

</html>