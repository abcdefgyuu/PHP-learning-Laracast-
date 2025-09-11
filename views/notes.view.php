 <?php require("partials/head.php") ?>
 <?php require("partials/nav.php") ?>
 <?php require("partials/banner.php") ?>


 <main>
   <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <ul>
      <?php foreach ($notes as $note) : ?>
        <li class="list-disc ml-6 text-blue-600"><a href="note?id=<?= $note['id']?>" class="text-blue-600 hover:underline"><?= htmlspecialchars($note['body']) ?></a></li>
      <?php endforeach; ?>
    </ul>
    <p class="mt-6"><a href="/learning/notes/create" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-md">Create Note</a></p>
   </div>
 </main>

 
 <?php require("partials/footer.php") ?>