<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 flex items-center justify-center min-h-screen font-sans">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border-4 border-pink-300">
    <h1 class="text-3xl font-bold text-pink-600 text-center mb-6">
       Welcome to Create View 
    </h1>

    <form action="<?=site_url('users/create');?>" method="post" class="space-y-4">
      
      <div>
        <label for="last_name" class="block text-pink-700 font-medium">Last Name:</label>
        <input type="text" id="last_name" name="last_name" 
               class="w-full px-4 py-2 rounded-lg border-2 border-pink-300 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <div>
        <label for="first_name" class="block text-pink-700 font-medium">First Name:</label>
        <input type="text" id="first_name" name="first_name" 
               class="w-full px-4 py-2 rounded-lg border-2 border-pink-300 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <div>
        <label for="email" class="block text-pink-700 font-medium">Email:</label>
        <input type="email" id="email" name="email" 
               class="w-full px-4 py-2 rounded-lg border-2 border-pink-300 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <div class="flex items-center justify-between">
        <button type="submit" 
                class="bg-pink-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-pink-600 transition">
          ✨ Submit ✨
        </button>
        <a href="<?=site_url('users/show');?>" 
           class="text-pink-600 underline hover:text-pink-800">
          ⬅ Back to Show
        </a>
      </div>
    </form>
  </div>

</body>
</html>
