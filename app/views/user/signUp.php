<?php require APPROOT . '\views\inc\header.php'; ?>

<!-- component -->
<div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
        <div class="relative sm:max-w-sm w-full">
            <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="relative w-full rounded-3xl  px-6 py-4 bg-green-300 shadow-md">
                <label for="" class="block mt-3 text-sm  text-gray-700 text-center font-bold">
                    Sign Up
                </label>
                <form action="<?php echo URLROOT; ?>user/signUp" method="post" class="mt-10">

                    <div>
                        <input type="text" placeholder="name" name="name" class="mt-1 p-3 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0  <?php echo (!empty($data['name_err'])) ? 'bg-red-500' : ''; ?>" value="<?php echo $data['name']?>">

                        <?php if (!empty($data["name_err"])) : ?>
                            <span class="text-red-500 text-sm"><?php echo $data["name_err"] ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mt-7">
                        <input type="email" placeholder="email" name="email" class="mt-1 p-3 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0  <?php echo (!empty($data['email_err'])) ? 'bg-red-500' : ''; ?>" value="<?php echo $data['email']?>">
                        <?php if (!empty($data["email_err"])) : ?>
                            <span class="text-red-500 text-sm"><?php echo $data["email_err"] ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mt-7">
                        <input type="password" placeholder="password" name="password" class="mt-1 p-3 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0  <?php echo (!empty($data['password_err'])) ? 'bg-red-500' : ''; ?>" value="<?php echo $data['password']?>">
                        <?php if (!empty($data["password_err"])) : ?>
                            <span class="text-red-500 text-sm"><?php echo $data["password_err"] ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mt-7">
                        <input type="password" placeholder="confirm password" name="confirm_password" class="mt-1 p-3 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0  <?php echo (!empty($data['confirm_password_err'])) ? 'bg-red-500' : ''; ?>" value="<?php echo $data['confirm_password']?>">
                        <?php if (!empty($data["confirm_password_err"])) : ?>
                            <span class="text-red-500 text-sm"><?php echo $data["confirm_password_err"] ?></span>
                        <?php endif; ?>
                    </div>



                    <div class="mt-7">
                        <button class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                            Sign up
                        </button>
                    </div>
                    <div class="mt-7">
                        <div class="flex justify-center items-center">
                            <label class="mr-2">
                                Do you already have an account?</label>
                            <a href="<?php echo URLROOT ?>user/signIn" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Sign in
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>