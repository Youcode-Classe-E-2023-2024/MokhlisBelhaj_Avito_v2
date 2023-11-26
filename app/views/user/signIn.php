<?php require APPROOT . '\views\inc\header.php'; ?>

<!-- component -->
<div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
        <div class="relative sm:max-w-sm w-full">
            <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="relative w-full rounded-3xl  px-6 py-4 bg-green-300 shadow-md">
                <label for="" class="block mt-3 text-sm  text-gray-700 text-center font-bold">
                    Login
                </label>
                <form method="#" action="#" class="mt-10">

                    

                    <div class="mt-7">
                        <input type="email" placeholder="email" class="mt-1 p-3 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0  <?php echo (!empty($data['email_err'])) ? 'bg-red-500' : ''; ?>" value="<?php echo $data['email']?>">
                        <?php if (!empty($data["email_err"])) : ?>
                            <span class="text-red-500 text-sm"><?php echo $data["email_err"] ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mt-7">
                        <input type="password" placeholder="password" class="mt-1 p-3 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0  <?php echo (!empty($data['password_err'])) ? 'bg-red-500' : ''; ?>" value="<?php echo $data['password']?>">
                        <?php if (!empty($data["password_err"])) : ?>
                            <span class="text-red-500 text-sm"><?php echo $data["password_err"] ?></span>
                        <?php endif; ?>
                    </div>

                    



                    <div class="mt-7">
                        <button class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                            Sign in
                        </button>
                    </div>
                    <div class="mt-7">
                        <div class="flex justify-center items-center">
                            <label class="mr-2">
                            Not a member yet?</label>
                            <a href="<?php echo URLROOT ?>user/signUp" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Sign up
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>