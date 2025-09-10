<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 min-h-screen flex flex-col items-center justify-center font-sans">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-4xl border-4 border-pink-300">
    <h1 class="text-3xl font-bold text-pink-600 text-center mb-6">
       Welcome to Show View 
    </h1>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse rounded-lg overflow-hidden shadow">
        <thead class="bg-pink-300 text-white">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Last Name</th>
            <th class="px-4 py-2 text-left">First Name</th>
            <th class="px-4 py-2 text-left">Email</th>
            <th class="px-4 py-2 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="bg-pink-50">
          <?php foreach (html_escape($users) as $user): ?>
            <tr class="border-b hover:bg-pink-100 transition">
              <td class="px-4 py-2"><?=$user['id'];?></td>
              <td class="px-4 py-2"><?=$user['last_name'];?></td>
              <td class="px-4 py-2"><?=$user['first_name'];?></td>
              <td class="px-4 py-2"><?=$user['email'];?></td>
              <td class="px-4 py-2 text-center">
                <a href="<?=site_url('users/update/'.$user['id']);?>" 
                   class="text-blue-600 hover:underline"> Update</a> |
                <a href="<?=site_url('users/delete/'.$user['id']);?>" 
                   class="text-red-500 hover:underline"> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="text-center mt-6">
      <a href="<?=site_url('users/create');?>" 
         class="bg-pink-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-pink-600 transition">
         Create Record
      </a>
    </div>
  </div>

</body>
</html>
