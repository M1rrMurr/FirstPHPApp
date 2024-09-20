<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<?php require basePath('views/partials/head.php') ?>

<body class="h-full">

  <div class="min-h-full">
    <?php require basePath('views/partials/nav.php') ?>
    <?php require basePath('views/partials/header.php') ?>

    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <h2>Welcome to the homepage, <?= $_SESSION['user']['email'] ?? 'Guest' ?></h2>
      </div>
    </main>
  </div>



</body>

</html>