<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 via-pink-200 to-pink-300 min-h-screen flex flex-col items-center justify-center font-sans">

  <div class="bg-white/90 backdrop-blur-sm p-10 rounded-3xl shadow-2xl w-full max-w-6xl border border-pink-300">
    
    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-pink-700 text-center mb-8 tracking-wide">
      💖 User Records
    </h1>

    <!-- Search Bar -->
    <form action="<?=site_url('users/show');?>" method="get" class="flex justify-end mb-6 gap-2">
      <?php $q = ''; if(isset($_GET['q'])) { $q = $_GET['q']; } ?>
      
      <input 
        class="border border-pink-300 rounded-xl px-5 py-3 w-72 shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-400 placeholder-pink-400 text-gray-700" 
        name="q" 
        type="text" 
        placeholder="🔍 Search users..." 
        value="<?=html_escape($q);?>"
      >

      <button type="submit" class="bg-pink-500 text-white px-6 py-3 rounded-xl shadow-md hover:bg-pink-600 hover:shadow-lg transition font-semibold">
        Search
      </button>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto rounded-2xl shadow-md">
      <table class="w-full border-collapse overflow-hidden">
        <thead class="bg-pink-400 text-white text-lg">
          <tr>
            <th class="px-5 py-3 text-left">ID</th>
            <th class="px-5 py-3 text-left">Last Name</th>
            <th class="px-5 py-3 text-left">First Name</th>
            <th class="px-5 py-3 text-left">Email</th>
            <th class="px-5 py-3 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="bg-pink-50">
          <?php foreach (html_escape($users) as $user): ?>
          <tr class="border-b border-pink-200 hover:bg-pink-100 transition">
            <td class="px-5 py-3 font-medium text-gray-700"><?=$user['id'];?></td>
            <td class="px-5 py-3"><?=$user['last_name'];?></td>
            <td class="px-5 py-3"><?=$user['first_name'];?></td>
            <td class="px-5 py-3 text-gray-600"><?=$user['email'];?></td>
            <td class="px-5 py-3 text-center">
              <a href="<?=site_url('users/update/'.$user['id']);?>" class="text-blue-600 hover:underline font-semibold">Update</a> | 
              <a href="<?=site_url('users/delete/'.$user['id']);?>" class="text-red-500 hover:underline font-semibold">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center text-pink-700 font-medium">
      <?php echo $page; ?>
    </div>

    <!-- Create Button -->
    <div class="text-center mt-8">
      <a href="<?=site_url('users/create');?>" class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-8 py-3 rounded-full shadow-lg hover:from-pink-600 hover:to-pink-700 transition transform hover:scale-105 font-bold">
        ➕ Create Record
      </a>
    </div>
  </div>
</body>
</html>