<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
?>
    <!-- Home Page Body -->
    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-4">Contact page</h1>
        <p class="text-gray-700 text-center pb-2">contact us!</p>
        <div class="flex justify-center">
            <form method="POST" class="border-2 rounded border-blue-500 p-2">
                <label for="body">Description</label>
                <div>
                    <textarea id="body" name="message" class="border-2 rounded p-2"><?= $_POST['body'] ?? '' ?></textarea>
                    <?php if (isset($errors['body'])) : ?>
                    <p class="text-red-400 text-sm"><?= $errors['body'] ?> </p>
                    <?php endif; ?>
                </div>
                <p>
                    <button type="submit" class="border p-1 border-gray-900 hover:bg-blue-500">Submit</button>
                </p>
            </form>
        </div>
        </p>
    </div>

<?php
require base_path("views/partials/footer.php");
?>