<?php require APPROOT . '\views\inc\header.php'; ?>
<?php require APPROOT . '\views\inc\navbar.php'; ?>
<div class=" flex justify-center  flex-wrap">
<?php
for($i=0; $i<9 ;$i++){?>
 <?php foreach ($data['post'] as $post) : ?>
<div class="relative top-20 m-10  flex  w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
  <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
    <img class="object-cover" src="<?php echo $post->image; ?>" alt="product image" />
  </a>
  <div class="mt-4 px-5 pb-5">
    <a href="#">
      <h5 class="text-xl tracking-tight text-slate-900"><?php echo $post->name; ?></h5>
    </a>
    <div class="mt-2 mb-5 flex items-center justify-between">
      <p>
        <span class="text-3xl font-bold text-slate-900">$<?php echo $post->prix; ?></span>
      </p>
     
    </div>
    <a href="<?php echo URLROOT?>/posts/show/<?php echo $post->id?>" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
  
      MORE</a
    >
  </div>
</div>
<?php endforeach; ?>

<?php };
?>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
