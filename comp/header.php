<!-- <link rel="stylesheet" href="header.css"> -->
<link rel="stylesheet" href="../comp/header.css">

<script src="https://cdn.tailwindcss.com"></script>

<?php 
echo '<header class="w-full mt-0 h-15 flex items-center bg-[#735DA5]">
<nav class="w-full flex justify-between items-center font-semibold">
    <a href="../index.php">
    <div  class="flex mx-10">
        <div class="mx-1">
            <div class="text-4xl text-white">B<span class="text-xl text-[#D3C5E5]">ank</span></div>
            <div class="h-[1px] mt-[2px] w-12 bg-white animate-pulse ease-in-out duration-75 delay-75"> </div>
        </div>
        <div class="text-xl text-[#D3C5E5] mt-2"><span class="text-4xl text-white">S</span>ystem</div>
    </div>
    </a>

    <div class="ml-auto text-white">
        <ul class="flex justify-end">
        <li class="px-10"><a href="../index.php">Home</a></li>
            <li class="px-10"><a href="../pages/show_customers.php">Customers Info</a></li>
            <li class="px-10"><a href="../pages/transfer.php">Money Transfer</a></li>
            <li class="px-10"><a href="../pages/transfer_hist.php">Transfer History</a></li>
        </ul>
    </div>
</nav>
</header>';