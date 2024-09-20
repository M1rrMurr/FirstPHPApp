<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<?php require basePath('views/partials/head.php') ?>

<body class="h-full">

    <div class="min-h-full">
        <?php require basePath('views/partials/nav.php') ?>
        <?php require basePath('views/partials/header.php') ?>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex justify-center">
                    <form class="flex flex-col w-1/2 gap-y-1" method="POST">
                        <label class="font-semibold" for="email">Email</label>
                        <input class="h-8 p-1 border-2 rounded-sm" name="email" id="email" type="">
                        <label class="font-semibold" for="password">Password</label>
                        <input class="h-8 p-1 border-2 rounded-sm" name="password" id="password" type="password">
                        <div>
                            <p class="text-sm text-red-500"><?= $errors['email'] ?? '' ?></p>
                            <p class="text-sm text-red-500"><?= $errors['password'] ?? '' ?></p>
                        </div>
                        <div class="flex justify-end">
                            <button class="mt-5 bg-blue-400 hover:bg-blue-500 text-white font-semibold transformation-all py-1 px-2 rounded-md">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>



</body>

</html>