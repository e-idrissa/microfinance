<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Microfin</title>
</head>
<body>
    <div class="w-full h-full relative">
        <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[58rem] h-[58rem] text-green-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="absolute top-[15rem] left-[70rem] w-[32rem] bg-opacity-25 bg-blur-lg bg-gray-600 backdrop-blur-md border border-gray-300 rounded-lg p-6">
            <div class="w-[30rem]">
                <div class="flex justify-center w-full">
                    <span class="text-xl font-bold text-green-700 uppercase">
                        microfinance
                    </span>
                </div>
            </div>
            <form action="../controllers/login.php" method="post" class="flex flex-col items-center justify-center mt-16">
                <div class="flex flex-col relative w-full pb-5">
                    <span class="text-xl text-green-600 pl-2 pb-2 opacity-0">Username</span>
                    <input type="text" name="username" id="username" class=" w-full h-10 rounded-lg px-[8.5rem] focus:outline-none text-gray-700">
                    <div class="absolute top-[42px] left-[.3rem] bg-green-500 flex items-center justify-center space-x-1 rounded-md py-[.125rem] px-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-md text-white font-semibold uppercase">Username</span>
                    </div>
                </div>
                <div class="flex flex-col relative w-full">
                    <input type="password" name="pwd" id="pwd" class=" w-full h-10 rounded-lg px-[8.5rem] focus:outline-none text-gray-700">
                    <div class="absolute top-[6px] left-[.3rem] bg-green-500 flex items-center justify-center space-x-1 rounded-md py-[.125rem] px-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                            <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-md text-white font-semibold uppercase">Password</span>
                    </div>
                </div>
                <div class="flex justify-center align-middle">
                    <button type="submit" value="submit" name="submit" class="text-xl px-8 py-3 rounded-md bg-green-500 text-white font-semibold mt-10 hover:bg-opacity-50 hover:border-green-500 hover:border-2">Submit</button>
                </div>
                <div class="mt-16">
                    <?php
                        if (isset($error)) {
                            foreach ($error as $error) { ?>
                                <span class="text-lg font-semibold text-red-400"><?= $error ?></span>
                            <?php }
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>