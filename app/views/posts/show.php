<?php require APPROOT . '\views\inc\header.php'; ?>
<?php require APPROOT . '\views\inc\navbar.php';
?>
<?php $user = $data['user'];
foreach ($data['post'] as $post);
?>
<div class="container pt-28 pb-4 mx-auto">
    <div class="p-6 bg-gray-100 rounded-lg shadow-md">
        <!-- Card 1 -->
        <div class="w-full">
            <div class="bg-cover h-30 lg:h-auto rounded-t-lg lg:rounded-t-none lg:rounded-l text-center" title="<?php echo $post->name ?>">
                <img class="object-cover w-full h-full rounded-t-lg lg:rounded-t-none lg:rounded-l" src="<?php echo $post->image ?>" alt="">
            </div>
            <div class="p-4 lg:p-6 bg-white rounded-b-lg lg:rounded-b-none lg:rounded-r">
                <div class="mb-4">
                    <h2 class="text-gray-900 font-bold text-xl lg:text-2xl mb-2"><?php echo $post->name ?></h2>
                    <p class="text-gray-700 text-base"><span class="text-black text-2l font-bold">Description : </span> <?php echo $post->desc ?></p>
                    <p class="text-gray-600"><span class="text-gray-900  font-bold">post at : </span> <?php echo $post->created_at ?></p>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="text-sm">
                        
                        <p class="text-gray-900 font-bold"><span class="text-black text-2l font-bold">seller : </span><?php echo $user->name ?></p>
                        <p class="text-gray-900 font-bold"><span class="text-black text-2l font-bold">contact : </span><?php echo $user->email ?></p>

                        
                    </div>
                    <div class="text-black text-2xl font-bold"><?php echo $post->prix ?>$</div>
                </div>
            </div>
        </div>
    </div>
</div>
