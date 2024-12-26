<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

    <form method="POST" action="/note">
      <input type="hidden" name="_method" value="patch">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="col-span-full">
              <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
              <div class="mt-2">
                <textarea name="body" id="body" rows="3" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= $note['body'] ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                  <p class="text-red-500 text-xs mt-2 "><?= $errors['body'] ?></p>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/note?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
          <button type="button" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="document.querySelector('#delete-form').submit()">Delete</button>
        </div>
    </form>
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <form id="delete-form" class="hidden" method="POST" action="/note">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
      </form>
    </div>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>