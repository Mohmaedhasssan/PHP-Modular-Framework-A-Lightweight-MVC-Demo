<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <p><a href="/notes" class="text-blue-500 hover:underline">GO Back</a></p>

        <p><?= htmlspecialchars($note['body']) ?></p>
        <br>
        <a href="/note/edit?id=<?= $note['id'] ?>"
            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >Edit</a>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>