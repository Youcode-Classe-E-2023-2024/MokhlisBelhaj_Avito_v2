<?php require APPROOT . '\views\inc\header.php'; ?>
<?php require APPROOT . '\views\inc\navbar.php'; ?>

<main class=" pt-28 ">

<?php
 if($_SESSION['role']): ?>
<section class="container  mx-auto p-6 font-mono">
  <div class="flex justify-center">
    <span class="text-2xl ">Users</span>
  </div>
 

    <div class="flex justify-between items-center p-3">
      <!-- Search form -->
      <form class="flex items-center justify-between" width="25%">

        <input id="users-search" class="bg-white dark:bg-slate-800  px-2 py-1 rounded-md border-black  " type="search">
        <label for="users-search" class=" px-1">
          <svg class=" " viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" width="15" height="30">
            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
          </svg>
        </label>
      </form>
    





    </div>


  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table id="tableUsers" class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-green-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Age</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Date</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
             
                
                  <p class="font-semibold">Nora</p>
                
              </div>
            </td>
            <td class="px-4 py-3 text-md font-semibold border">17</td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"> Nnacceptable </span>
            </td>
            <td class="px-4 py-3 text-sm border">6/10/2020</td>
          </tr>
          <tr  class="text-gray-700">
            <td  class="px-4 py-3 border">
                  <p class="font-semibold">Ali</p>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">23</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php endif;?>

<section class="container mx-auto p-6 font-mono">
  <div class="flex justify-center">
    <span class="text-2xl ">Posts</span>
 
  </div>
  <div class="flex justify-between items-center p-3">
      <!-- Search form -->
      <form class="flex items-center justify-between" width="25%">

        <input id="posts-search" class="bg-white dark:bg-slate-800  px-2 py-1 rounded-md border-black  " type="search">
        <label for="posts-search" class=" px-1">
          <svg class=" " viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" width="15" height="30">
            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
          </svg>
        </label>
      </form>
      <div>
        <a  href="<?php echo URLROOT?>/posts" class="flex justify-center uppercase bg-blue-500 w-40 py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
          new post
        </a>
      </div>
    </div>
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-green-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">name</th>
            <th class="px-4 py-3">image</th>
            <th class="px-4 py-3">desc</th>
            <th class="px-4 py-3">prix</th>
          </tr>
        </thead>
        <tbody id="tablePosts" class="bg-white">
        <?php foreach ($data['post'] as $post) : ?>
          <tr class="text-gray-700">
            <td class="px-4 py-3 text-md font-semibold border"><?php echo $post->name;?></td>
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-10 h-10 mr-3 ">
                  <img class="object-cover w-full h-full " src="<?php echo $post->image;?>" alt="" loading="lazy" />
                
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1  rounded-sm"> <?php echo $post->desc;?></span>
            </td>
            <td class="px-4 py-3 text-sm border"><?php echo $post->prix;?></td>
          </tr>
          <?php endforeach; ?>
          <!-- <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                  <p class="font-semibold">Ali</p>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">23</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>
</section>
</main>

<script>
var inputUsers = document.getElementById("users-search");
var tableUsers = document.getElementById("tableUsers");
var rowsUsers = tableUsers.querySelectorAll("tbody tr");

inputUsers.addEventListener("keyup", function() {
    var searchValue = inputUsers.value.trim().toLowerCase();

    rowsUsers.forEach(function(row) {
        var nameCell = row.querySelector("td:first-child");
        var name = nameCell.textContent.trim().toLowerCase();

        if (searchValue === "") {
            row.removeAttribute("hidden");
        } else if (name.includes(searchValue)) {
            row.removeAttribute("hidden");
        } else {
            row.setAttribute("hidden", "true");
        }
    });
});

var inputPosts = document.getElementById("posts-search");
var tablePosts = document.getElementById("tablePosts");
var rowsPosts = tablePosts.querySelectorAll("tbody tr");

inputPosts.addEventListener("keyup", function() {
    var searchValue = inputPosts.value.trim().toLowerCase();

    rowsPosts.forEach(function(row) {
        var nameCell = row.querySelector("td:first-child");
        var name = nameCell.textContent.trim().toLowerCase();

        if (searchValue === "") {
            row.removeAttribute("hidden");
        } else if (name.includes(searchValue)) {
            row.removeAttribute("hidden");
        } else {
            row.setAttribute("hidden", "true");
        }
    });
});



</script>

<?php require APPROOT . '\views\inc\footer.php'; ?>