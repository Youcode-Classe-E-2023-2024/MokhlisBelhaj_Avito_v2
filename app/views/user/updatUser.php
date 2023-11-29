<?php require APPROOT . '\views\inc\header.php'; ?>
<?php require APPROOT . '\views\inc\navbar.php'; ?>
<div class="bg-blue-200 min-h-screen flex items-center">
    <div class="w-full">
        <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">new posts</h2>
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="<?php echo URLROOT ?>/User/updatUser/<?php echo $_SESSION['user_id']?>" method="post">
               

                    
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-600 uppercase">name</label>
                    <input type="text" id="name" name="name" placeholder="<?php echo $_SESSION['name']?>" class="border border-gray-300 shadow p-3 w-full rounded ">
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 font-bold text-gray-600 uppercase" >email</label>
                    <input type="email" id="email" name="email" 
                     class="border border-gray-300 shadow p-3 w-full rounded " placeholder ="<?php echo $_SESSION['email']?>">
                </div>

                <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '\views\inc\footer.php'; ?>