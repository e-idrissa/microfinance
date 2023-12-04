<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        header("location:./login.php");
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
    <div class="p-10 px-48 w-full">
        <a href="./dashboard.php" class="flex items-center text-blue-500 font-semibold space-x-2 text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>
            <span>Back</span>
        </a>
        <div class="flex flex-col px-48 mx-12 justify-center w-full mt-24">
            <span class="text-2xl font-bold text-gray-700 text-center">Nouveau Compte</span>
            <form action="../controllers/addCompte.php" method="post">
                <div class="flex flex-col items-center justify-center mt-4 space-y-2">
                    <div class="flex items-center w-2/3 space-x-8">
                        <div class="flex flex-col space-y-2 w-full">
                            <label for="nom" class="text-lg text-gray-700">Nom</label>
                            <input type="text" name="nom" id="nom" placeholder="Hemedy" class="bg-gray-200 p-2 rounded" required>
                        </div>
                        <div class="flex flex-col space-y-2 w-full">
                            <label for="prenom" class="text-lg text-gray-700">Prenom</label>
                            <input type="text" name="prenom" id="prenom" placeholder="Eddy" class="bg-gray-200 p-2 rounded" required>
                        </div>
                    </div>
                    <div class="flex items-center w-2/3 space-x-8">
                        <div class="flex flex-col space-y-2 w-full">
                            <label for="phone" class="text-lg text-gray-700">Telephone</label>
                            <input type="text" name="phone" id="phone" placeholder="+243973352406" class="bg-gray-200 p-2 rounded" required>
                        </div>
                        <div class="flex flex-col space-y-2 w-full">
                            <label for="email" class="text-lg text-gray-700">Email</label>
                            <input type="email" name="email" id="email" placeholder="eddy@gmail.com" class="bg-gray-200 p-2 rounded" required>
                        </div>
                    </div>
                    <div class="flex items-center w-2/3 space-x-8">
                        <div class="flex flex-col space-y-2 w-full">
                            <label for="adresse" class="text-lg text-gray-700">Adresse</label>
                            <input type="text" name="adresse" id="adresse" placeholder="123, de la Mission, Himbi" class="bg-gray-200 p-2 rounded" required>
                        </div>
                    </div>
                    <div class="flex items-center w-2/3 space-x-8">
                        <div class="flex flex-col space-y-2 w-1/4">
                            <label for="solde" class="text-lg text-gray-700">Depot Initial (USD)</label>
                            <input type="number" name="solde" id="solde" placeholder="200" min="200" class="bg-gray-200 p-2 rounded" required>
                        </div>
                        <input type="hidden" name="etat" value="Actif" required>
                    </div>
                    <div class="flex items-center justify-end mt-2 w-2/3">
                        <input type="submit" name="submit" class="px-4 py-2 my-4 rounded-md bg-blue-500 font-semibold text-white">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>