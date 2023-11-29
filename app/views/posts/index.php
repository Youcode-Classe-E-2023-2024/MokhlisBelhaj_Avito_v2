<?php require APPROOT . '\views\inc\header.php'; ?>
<?php require APPROOT . '\views\inc\navbar.php'; ?>
<div class="bg-blue-200 min-h-screen flex items-center">
    <div class="w-full">
        <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">new posts</h2>
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="<?php echo URLROOT ?>/Posts/add" method="post" enctype="multipart/form-data">
               

                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-600 uppercase">Name</label>
                    <input type="text" id="name" name="name" placeholder="Post name." class="border border-gray-300 shadow p-3 w-full rounded <?php echo (!empty($data["name_err"])) ? 'bg-red-500' : ''; ?>" value="<?php echo (empty($data["name_err"])) ? $data['name'] : ''; ?>">
                    <?php if (!empty($data["name_err"])) : ?>
                        <span class="text-red-500 text-sm"><?php echo $data["name_err"] ?></span>
                    <?php endif; ?>
                </div>

                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase" for="large_size">image</label>
                        <input class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg
                         cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700
                          dark:border-gray-600 dark:placeholder-gray-400" name="image" id="large_size" type="file">
                        <?php if (!empty($data["image_err"])) : ?>
                            <span class="text-red-500 text-sm"><?php echo $data["image_err"] ?></span>
                        <?php endif; ?>
                    </div>
               



                <div class="mb-5">
                    <label for="desc" class="block mb-2 font-bold text-gray-600 uppercase">description</label>
                    <input type="text" id="desc" name="desc" placeholder="description." class="border border-gray-300 shadow p-3 w-full rounded <?php echo (!empty($data["desc_err"])) ? 'bg-red-500' : ''; ?>" value="<?php echo (empty($data["desc_err"])) ? $data['desc'] : ''; ?>">
                    <?php if (!empty($data["desc_err"])) : ?>
                        <span class="text-red-500 text-sm"><?php echo $data["desc_err"] ?></span>
                    <?php endif; ?>
                </div>

                <div class="mb-5">
                    <label for="prix" class="block mb-2 font-bold text-gray-600 uppercase">prix</label>
                    <input type="prix" id="prix" name="prix" placeholder="prix." class="border border-gray-300 shadow p-3 w-full rounded <?php echo (!empty($data["prix_err"])) ? 'bg-red-500' : ''; ?>" value="<?php echo (empty($data["prix_err"])) ? $data['prix'] : ''; ?>">
                    <?php if (!empty($data["prix_err"])) : ?>
                        <span class="text-red-500 text-sm"><?php echo $data["prix_err"] ?></span>
                    <?php endif; ?>
                </div>

                <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '\views\inc\footer.php'; ?>