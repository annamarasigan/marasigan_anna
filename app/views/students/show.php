<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-pink-50 text-gray-800">

 <!-- Navbar -->
<nav class="fixed top-0 left-0 w-full bg-pink-200 border-b border-pink-300 shadow-md z-50">
    <div class="max-w-screen-xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3">
        
        <!-- Title -->
        <h1 class="text-xl font-bold text-pink-700">User Data List</h1>

        <!-- Right Controls -->
        <div class="flex flex-col sm:flex-row items-center gap-3">

            <!-- Search Form -->
            <form action="<?= site_url('users/show'); ?>" method="get" class="flex items-center gap-2">
                <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
                <input type="text" name="q" placeholder="Search..."
                    value="<?= html_escape($q); ?>"
                    class="px-3 py-2 rounded-md bg-pink-100 border border-pink-300 focus:ring-2 focus:ring-pink-400 text-gray-800 w-48 sm:w-64">
                
                <!-- Search -->
                <button type="submit"
                    class="px-4 py-2 bg-pink-500 hover:bg-pink-600 rounded-md text-white font-semibold">
                    Search
                </button>

                <!-- Clear -->
                <a href="<?= site_url('users/show'); ?>"
                    class="px-4 py-2 bg-pink-100 hover:bg-pink-200 rounded-md text-pink-700 font-semibold border border-pink-300">
                    Clear
                </a>
            </form>

            <!-- Create Button (Admin Only) -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <a href="<?= site_url('users/create'); ?>"
                    class="px-4 py-2 bg-pink-500 hover:bg-pink-600 rounded-md text-white font-semibold"
                    onclick="showLoading(event)">
                    Create
                </a>
            <?php endif; ?>

            <!-- Logout -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <button id="logoutBtn"
                    class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-md text-white font-semibold">
                    Logout
                </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center text-gray-800 border border-pink-300">
            <h2 class="text-lg font-bold mb-4 text-pink-700">Confirm Logout</h2>
            <p class="mb-6">Are you sure you want to logout?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmLogoutBtn"
                    class="px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-md font-semibold">
                    Yes
                </button>
                <button id="cancelLogoutBtn"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md font-semibold">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <section class="w-full px-3 sm:px-6 pt-32 pb-10">
        <div class="overflow-x-auto rounded-lg shadow-xl border border-pink-200 bg-white">
            <table class="min-w-full border border-pink-200 border-collapse text-gray-800 text-sm sm:text-base">
                <thead class="bg-pink-100">
                    <tr>
                        <th class="px-4 py-3 text-left uppercase text-xs font-semibold border-r border-pink-200">ID</th>
                        <th class="px-4 py-3 text-left uppercase text-xs font-semibold border-r border-pink-200">Last Name</th>
                        <th class="px-4 py-3 text-left uppercase text-xs font-semibold border-r border-pink-200">First Name</th>
                        <th class="px-4 py-3 text-left uppercase text-xs font-semibold border-r border-pink-200">Email</th>
                        <?php if ($current_role === 'admin'): ?>
                            <th class="px-4 py-3 text-left uppercase text-xs font-semibold">Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-100">
                    <?php
                    $colors = ['bg-pink-400', 'bg-pink-500', 'bg-pink-600'];
                    $i = 0;
                    foreach (html_escape($users) as $user):
                        $color = $colors[$i % count($colors)];
                    ?>
                        <tr class="hover:bg-pink-50 transition">
                            <td class="px-4 py-3 border-r border-pink-200">
                                <span class="px-3 py-1 rounded-md text-white font-bold <?= $color ?>">
                                    <?= sprintf("%02d", $user['id']); ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 border-r border-pink-200"><?= $user['last_name']; ?></td>
                            <td class="px-4 py-3 border-r border-pink-200"><?= $user['first_name']; ?></td>
                            <td class="px-4 py-3 border-r border-pink-200 break-all"><?= $user['email']; ?></td>
                            <?php if ($current_role === 'admin'): ?>
                                <td class="px-4 py-3">
                                    <div class="flex gap-3 justify-center sm:justify-start">
                                        <a href="<?= site_url('users/update/' . $user['id']); ?>"
                                            onclick="showLoading(event)"
                                            class="w-9 h-9 bg-pink-400 rounded-full flex items-center justify-center transition hover:bg-pink-500">
                                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828911.png" alt="Edit" class="w-4 h-4 invert brightness-0">
                                        </a>

                                        <button type="button"
                                            class="w-9 h-9 bg-red-400 rounded-full flex items-center justify-center transition hover:bg-red-500 delete-btn"
                                            data-delete-url="<?= site_url('users/delete/' . $user['id']); ?>">
                                            <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="Delete" class="w-4 h-4 invert brightness-0">
                                        </button>

                                        <!-- Delete Modal -->
                                        <div id="deleteModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                                            <div class="bg-white p-6 rounded-lg w-80 text-gray-800 border border-pink-300">
                                                <h2 class="text-lg font-bold mb-4 text-center text-pink-700">Confirm Deletion</h2>
                                                <p class="mb-6 text-center">Are you sure you want to delete this record?</p>
                                                <div class="flex justify-center gap-4">
                                                    <a id="confirmDeleteBtn"
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-md font-semibold text-white">
                                                        Yes, Delete
                                                    </a>
                                                    <button id="cancelDeleteBtn"
                                                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md font-semibold">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="fixed bottom-4 right-4 flex flex-wrap gap-2 z-50">
            <?php if (isset($page)) echo $page; ?>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const logoutBtn = document.getElementById("logoutBtn");
            const logoutModal = document.getElementById("logoutModal");
            const cancelLogoutBtn = document.getElementById("cancelLogoutBtn");
            const confirmLogoutBtn = document.getElementById("confirmLogoutBtn");
            const logoutForm = document.getElementById("logoutForm");

            logoutBtn?.addEventListener("click", function() {
                logoutModal.classList.remove("hidden");
            });
            cancelLogoutBtn?.addEventListener("click", function() {
                logoutModal.classList.add("hidden");
            });
            confirmLogoutBtn?.addEventListener("click", function() {
                logoutForm.submit();
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const deleteBtns = document.querySelectorAll(".delete-btn");
            const deleteModal = document.getElementById("deleteModal");
            const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
            const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

            let deleteUrl = "";
            deleteBtns.forEach(btn => {
                btn.addEventListener("click", function() {
                    deleteUrl = this.getAttribute("data-delete-url");
                    deleteModal.classList.remove("hidden");
                });
            });

            cancelDeleteBtn.addEventListener("click", function() {
                deleteModal.classList.add("hidden");
            });
            confirmDeleteBtn.addEventListener("click", function() {
                window.location.href = deleteUrl;
            });
        });
    </script>

</body>

</html>
