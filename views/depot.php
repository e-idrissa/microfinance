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
    <?php
        include_once '../controllers/getCompte.php';
    ?>
    <div class="p-10 px-48 w-full">
        <a href="./dashboard.php" class="flex items-center text-blue-500 font-semibold space-x-2 text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>
            <span>Back</span>
        </a>
        <div class="flex flex-col px-48 mx-12 justify-center w-full mt-24">
            <span class="text-2xl font-bold text-gray-700 text-center">Effectuer un Depot</span>
            <form action="../controllers/depot.php" method="post">
                <div class="flex flex-col items-center justify-center mt-8 space-y-2">
                    <div class="flex items-center w-2/3 space-x-8">
                        <div class="flex flex-col space-y-2 w-full">
                            <label for="compte" class="text-lg text-gray-700">Nom</label>
                            <select name="compte" id="compte" class="bg-gray-200 p-2 rounded" required>
                                <option value="">Selectionner un compte</option>
                                <?php
                                    foreach($comptes = getComptes() as $compte) {
                                    echo "<option value=".$compte->getId().">".$compte->getNom()." ".$compte->getPrenom()."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 w-full">
                            <label for="montant" class="text-lg text-gray-700">Montant (USD)</label>
                            <input type="number" name="montant" id="montant" placeholder="200" class="bg-gray-200 p-2 rounded" required>
                        </div>
                    </div>
                    <input type="hidden" name="op" value="depot" required>
                    <div class="flex items-center justify-end mt-2 w-2/3">
                        <input type="submit" name="submit" class="px-4 py-2 my-4 rounded-md bg-blue-500 font-semibold text-white">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>