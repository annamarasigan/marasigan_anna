<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-pink-50 flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 border border-pink-200">
        <!-- Title -->
        <h1 class="text-3xl font-bold mb-6 text-center text-pink-600">Update User</h1>

        <!-- Form -->
        <form action="<?= site_url('users/update/' . $user['id']); ?>" method="post" class="space-y-5">
            <!-- Last Name -->
            <div class="flex flex-col">
                <label for="last_name" class="mb-1 font-semibold text-pink-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" required
                    value="<?= html_escape($user['last_name']); ?>"
                    class="px-3 py-2 rounded-lg bg-pink-100 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- First Name -->
            <div class="flex flex-col">
                <label for="first_name" class="mb-1 font-semibold text-pink-700">First Name</label>
                <input type="text" id="first_name" name="first_name" required
                    value="<?= html_escape($user['first_name']); ?>"
                    class="px-3 py-2 rounded-lg bg-pink-100 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- Email -->
            <div class="flex flex-col">
                <label for="email" class="mb-1 font-semibold text-pink-700">Email</label>
                <input type="email" id="email" name="email" required
                    value="<?= html_escape($user['email']); ?>"
                    class="px-3 py-2 rounded-lg bg-pink-100 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- Status -->
            <div class="flex flex-col">
                <label for="status" class="mb-1 font-semibold text-pink-700">Status</label>
                <select id="status" name="status"
                    class="px-3 py-2 rounded-lg bg-pink-100 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400 w-full">
                    <option value="Active" <?= $user['status'] === "Active" ? "selected" : ""; ?>>Active</option>
                    <option value="Inactive" <?= $user['status'] === "Inactive" ? "selected" : ""; ?>>Inactive</option>
                    <option value="Unknown" <?= $user['status'] === "Unknown" ? "selected" : ""; ?>>Unknown</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mt-6">
                <button type="submit"
                    class="flex-1 px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-lg font-semibold transition">
                    Update
                </button>

                <a href="<?= site_url('users/show'); ?>"
                    class="flex-1 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-semibold text-center transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</body>

</html>
