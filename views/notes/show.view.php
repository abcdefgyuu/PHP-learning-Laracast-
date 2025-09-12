<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl text-center text-bold text-blue-700 <?= $note['user_id'] !== $currentUserId ? "hidden" : "" ?>"><?= htmlspecialchars($note['body']) ?></h2>
    <?php if ($note['user_id'] !== $currentUserId) : ?>
      <p class="text-red-500">You do not have permission to view this note.</p>
    <?php endif; ?>
  </div>
</main>

<?php base_path("views/partials/footer.php") ?>