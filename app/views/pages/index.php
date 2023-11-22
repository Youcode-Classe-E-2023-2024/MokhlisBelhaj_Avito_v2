<?php require APPROOT . '\views\inc\header.php'; ?>
<?php require APPROOT . '\views\inc\navbar.php'; ?>
<div class=" container flex justify-evenly flex-wrap">
<?php
for($i=0; $i<9 ;$i++){?>
<div class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
  <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
    <img class="object-cover" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="product image" />
  </a>
  <div class="mt-4 px-5 pb-5">
    <a href="#">
      <h5 class="text-xl tracking-tight text-slate-900">Nike Air MX Super 2500 - Red</h5>
    </a>
    <div class="mt-2 mb-5 flex items-center justify-between">
      <p>
        <span class="text-3xl font-bold text-slate-900">$449</span>
      </p>
     
    </div>
    <a href="#" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
     
      MORE</a
    >
  </div>
</div>

<?php };
?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
