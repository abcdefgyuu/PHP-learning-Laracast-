<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl text-center text-bold text-blue-700"><?= htmlspecialchars($note['body']) ?></h2>

    <a href="notes/edit?id=<?=$note['id']?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
    <form action="" method="POST" class="mt-6">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
      <button class="px-4 py-2 rounded text-white bg-red-500">Delete</button>
    </form>

  </div>
</main>

<?php base_path("views/partials/footer.php") ?>