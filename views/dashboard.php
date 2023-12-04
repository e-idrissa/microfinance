<?php
    session_start();

    // Session
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        header("location:./login.php");
    }
    // Logout
    if (isset($_GET['logout'])) {
        if ($_GET['logout'] == true) {
            session_destroy();
            header("location:./login.php");
        }
    }

?>

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
    <?php
        include_once '../controllers/getCompte.php';
        include_once '../controllers/dashboard.php';
        include_once '../controllers/formatNumber.php';
    ?>
    <div class="flex flex-col w-full px-8">
        <div class="flex p-8  justify-between items-center w-full">
            <div class="flex items-center justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2>MICROFIN</h2>
            </div>
            <a href="?logout=true" class="px-4 py-2 flex items-center bg-blue-500 rounded space-x-1 font-semibold text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                <span>Logout</span>
            </a>
        </div>
        <div class="flex items-start px-12">
            <div class="flex flex-col pl-12 w-1/6 mt-20">
                <a href="./nouveau.php" class="p-2 px-3 my-2 text-lg text-white font-semibold bg-blue-400 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                    <span class="ml-2">Nouveau Compte</span>
                </a>
                <a href="./depot.php" class="p-2 px-3 my-2 text-lg text-white font-semibold bg-blue-400 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                    </svg>
                    <span class="ml-2">Depot</span>
                </a>
                <a href="./retrait.php" class="p-2 px-3 my-2 text-lg text-white font-semibold bg-blue-400 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                    </svg>
                    <span class="ml-2">Retrait</span>
                </a>
                <a href="./effacer.php" class="p-2 px-3 my-2 text-lg text-white font-semibold bg-blue-400 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    <span class="ml-2">Effacer Compte</span>
                </a>
            </div>
            <div class="w-3/5 px-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                        </svg>
                        <span class="text-3xl font-bold text-gray-700">Insights</span>
                    </div>
                    <div class="flex rounded-lg items-center space-x-2 border border-4 border-blue-500">
                        <div class="flex items-center justify center text-white bg-blue-500 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                        </div>
                        <span class="text-gray-700 pr-3 font-semibold text-xl">
                            <?php
                                date_default_timezone_set('Africa/Kinshasa');
                                $date = date('Y-m-d');
                                echo $date;
                            ?>
                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-start my-8 space-x-4">
                    <div class="rounded-lg bg-green-200 p-4 w-2/3 h-64">
                        <span class="text-4xl font-bold capitalize text-green-700">
                            Liquidites
                        </span>
                        <div class="flex items-center justify-start mt-16 space-x-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12 text-green-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-[86px] font-bold capitalize text-green-700">
                                <?= formatNumber(getSoldeTotal()); ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col w-1/3 space-y-4">
                        <div class="rounded-lg bg-blue-200 p-3 w-full">
                            <span class="text-2xl font-semibold capitalize text-blue-700">
                                Depots
                            </span>
                            <div class="flex items-center justify-start mt-6 space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-4xl font-bold capitalize text-blue-700">
                                    <?= formatNumber(getDepotTotal()); ?>
                                </span>
                            </div>
                        </div>
                        <div class="rounded-lg bg-blue-200 p-3 w-full">
                            <span class="text-2xl font-semibold capitalize text-blue-700">
                                Retraits
                            </span>
                            <div class="flex items-center justify-start mt-6 space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-4xl font-bold capitalize text-blue-700">
                                    <?= formatNumber(getRetraitTotal()); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-start w-[650px] bg-gray-200 rounded-lg p-4">
                    <div class="flex items-center space-x-2 px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-3xl font-bold text-gray-700">Recent Activities</span>
                    </div>
                    <div class="flex flex-col px-10 py-4 w-full space-y-3">
                        <div class="flex items-center p-2 w-[500px] rounded-md bg-white">
                            <div class="flex items-center justify-center rounded bg-green-200 px-6">
                                <span class="text-lg font-semibold text-gray-600">Depot</span>
                            </div>
                            <div class="flex items-center justify-between w-full rounded pl-16 pr-8">
                                <span class="text-lg font-bold text-gray-600 pr-10">$ 2000</span>
                                <div class="flex items-center space-x-4">
                                    <span class="text-lg font-bold text-gray-600">12-10-2023</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> 
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-2 w-[500px] rounded-md bg-white">
                            <div class="flex items-center justify-center rounded bg-green-200 px-6">
                                <span class="text-lg font-semibold text-gray-600">Depot</span>
                            </div>
                            <div class="flex items-center justify-between w-full rounded pl-16 pr-8">
                                <span class="text-lg font-bold text-gray-600 pr-10">$ 2000</span>
                                <div class="flex items-center space-x-4">
                                    <span class="text-lg font-bold text-gray-600">12-10-2023</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> 
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-2 w-[500px] rounded-md bg-white">
                            <div class="flex items-center justify-center rounded bg-green-200 px-6">
                                <span class="text-lg font-semibold text-gray-600">Depot</span>
                            </div>
                            <div class="flex items-center justify-between w-full rounded pl-16 pr-8">
                                <span class="text-lg font-bold text-gray-600 pr-10">$ 2000</span>
                                <div class="flex items-center space-x-4">
                                    <span class="text-lg font-bold text-gray-600">12-10-2023</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> 
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-2 w-[500px] rounded-md bg-white">
                            <div class="flex items-center justify-center rounded bg-green-200 px-6">
                                <span class="text-lg font-semibold text-gray-600">Depot</span>
                            </div>
                            <div class="flex items-center justify-between w-full rounded pl-16 pr-8">
                                <span class="text-lg font-bold text-gray-600 pr-10">$ 2000</span>
                                <div class="flex items-center space-x-4">
                                    <span class="text-lg font-bold text-gray-600">12-10-2023</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col px-8 py-4 w-1/5 bg-gray-200 rounded-lg">
                <div class="flex items-center space-x-2 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                    </svg>
                    <span class="text-3xl font-bold text-gray-700 pb-4">Comptes</span>
                </div>
                <div class="h-[37rem] overflow-y-scroll scrollbar-hidden bg-gray-200 pt-2">
                    <?php foreach($comptes = getComptes() as $compte) { ?>
                        <div class="flex items-center border border-b-1 border-b-gray-500 py-1 cursor-pointer"  onclick="openModal('<?= $compte->getNom() ?>', '<?= $compte->getPrenom() ?>', '<?= $compte->getPhone() ?>', '<?= $compte->getEmail() ?>', '<?= $compte->getAdresse() ?>', '<?= $compte->getSolde() ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="font-semibold ml-1"><?php echo $compte->getNom()." ".$compte->getPrenom(); ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div id="myModal" class="fixed inset-0 z-50 hidden overflow-hidden bg-gray-400 bg-opacity-50">
            <div class="flex items-center justify-center h-screen">
                <div class="modal-content bg-white rounded-md shadow-md w-[18rem]">
                    <div class="modal-header flex justify-end items-center p-1">
                        <button class="text-red-500 focus:outline-none rounded hover:bg-red-500 hover:text-white" onclick="closeModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="flex items-center space-x-1 px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                            </svg>              
                            <h5 class="modal-title text-lg font-semibold text-green-500">Details du compte</h5>
                        </div>
                    <div class="flex items-center space-x-2 px-6">
                        <div class="flex flex-col py-3">
                            <h2 class="text-lg font-bold" id="Nom"></h2>
                            <p class="text-sm italic" id="Email"></p>
                            <p class="text-md" id="Phone"></p>
                            <div class="flex items-center py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500 -ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <p class="text-md" id="Adresse"></p>
                            </div>
                            <p class="text-lg text-green-700 font-bold px-3 py-1 bg-green-200 w-full rounded text-right" id="Solde"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openModal(nom, prenom, phone, email, adresse, solde) {
                console.log(nom,phone,email,adresse,solde);
                document.getElementById('Nom').innerText = nom+" "+prenom;
                document.getElementById('Phone').innerText = phone;
                document.getElementById('Email').innerText = email;
                document.getElementById('Adresse').innerText = adresse;
                if(solde>999) {
                    document.getElementById('Solde').innerText = "$ "+solde/1000+" Thousands";
                }
                if(solde>999999) {
                    document.getElementById('Solde').innerText = "$ "+solde/1000000+" Millions";
                }
                if(solde<999) {
                    document.getElementById('Solde').innerText = "$ "+solde;
                }
                var modal = document.getElementById('myModal');
                document.body.classList.add('blurred');
                modal.classList.remove('hidden');

            }
            function closeModal() {
            var modal = document.getElementById('myModal');
            document.body.classList.remove('blurred');
            modal.classList.add('hidden');
            }
        </script>

    </div>
</body>
</html>