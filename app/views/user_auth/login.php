<!DOCTYPE html>
<html lang="en" class="h-full bg-pink-50 text-gray-800">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4">
    <main class="w-full max-w-sm bg-white p-8 rounded-2xl shadow-lg border border-pink-200">
        <h1 class="text-3xl font-bold tracking-wide text-center mb-6 text-pink-600">LOGIN</h1>

        <?php if (isset($error)): ?>
            <div class="mb-4 text-sm text-red-500 bg-red-100 border border-red-300 px-4 py-2 rounded-md">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login'); ?>" method="post" class="space-y-5">
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-semibold mb-1 text-pink-700">Username or Email:</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username or email"
                    required
                    class="w-full bg-pink-50 border border-pink-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-300 text-gray-800 rounded-lg px-3 py-2 text-sm outline-none transition" />
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-semibold mb-1 text-pink-700">Password:</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    class="w-full bg-pink-50 border border-pink-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-300 text-gray-800 rounded-lg px-3 py-2 text-sm outline-none transition pr-10" />

                <button type="button" id="togglePassword"
                    class="absolute right-3 top-9 flex items-center justify-center text-gray-400 hover:text-pink-600 focus:outline-none">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path id="eyePath" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path id="eyePath2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Buttons -->
            <button
                type="submit"
                class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-lg py-2 mt-2 transition focus:outline-none focus:ring-2 focus:ring-pink-300">
                Login
            </button>
        </form>

        <!-- Register link -->
        <p class="text-sm text-center mt-6 text-gray-600">Don't have an account?
            <a href="<?= site_url('register'); ?>" class="text-pink-600 font-semibold hover:underline">Register</a>
        </p>
    </main>

    <script>
        const togglePassword = document.getElementById("togglePassword");
        const passwordField = document.getElementById("password");
        const eyePath = document.getElementById("eyePath");
        const eyePath2 = document.getElementById("eyePath2");

        const eyeSVGPaths = {
            eye: [
                "M15 12a3 3 0 11-6 0 3 3 0 016 0z",
                "M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
            ],
            eyeOff: [
                "M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.66-3.156M6.25 6.25l11.5 11.5",
                ""
            ]
        };

        togglePassword.addEventListener("click", function() {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);

            if (type === "password") {
                eyePath.setAttribute("d", eyeSVGPaths.eye[0]);
                eyePath2.setAttribute("d", eyeSVGPaths.eye[1]);
            } else {
                eyePath.setAttribute("d", eyeSVGPaths.eyeOff[0]);
                eyePath2.setAttribute("d", eyeSVGPaths.eyeOff[1]);
            }
        });
    </script>
</body>

</html>
