<?php 
		session_start();
		$userSaisie = $_SESSION['username'];
		// User name base de données
		$user = 'Marrouche';
		
		//mdp user de la base de données
		$pass = 'password';
		
		// Nom de la base de donnée
		$mydatabase = 'MYSQL_DATABASE';
		
		$conn = new mysqli('Mini_Drive', $user, $pass, $mydatabase);
		$conn->set_charset("utf8");

		if ($conn->connect_error) 
			echo "erreurrrrrrrrrrrrrrr";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="../dist/output.css">
		<title>Momentos</title>
		<link rel="icon" type="image/x-icon" href="./img/favicon.png">
	</head>



	<body class="bg-slate-100">
		<nav class="bg-white border-b shadow-sm border-slate-300">
			<div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="relative flex items-center justify-between h-16">
					<div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
						<!-- Mobile menu button-->
						<button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
							<span class="sr-only">Open main menu</span>
							<!--
							Icon when menu is closed.
				
							Menu open: "hidden", Menu closed: "block"
							-->
							<svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
							</svg>
							<!--
							Icon when menu is open.
				
							Menu open: "block", Menu closed: "hidden"
							-->
							<svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
					<div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
						<div class="flex items-center flex-shrink-0">
							<img class="block w-auto h-8 lg:hidden" src="./img/favicon_black.png" alt="Logo 'Momentos'">
							<img class="hidden w-auto h-8 lg:block" src="./img/favicon_black.png" alt="Logo 'Momentos'">
						</div>
						<div class="hidden sm:ml-6 sm:block">
							<div class="flex ml-8 space-x-4">
								<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
								<a href="#" class="h-full px-3 py-2 text-sm font-medium text-white bg-indigo-600 border-b-2 rounded-md" aria-current="page">Espace personnel</a>
								<a href="./drive_public.php" class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">Espace public</a>
							</div>
						</div>
					</div>
					<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
			
						<!-- Profil -->
						<div>
							<div>
								<a href="./login.html">
									<button type="button" class="flex space-x-2 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
										<p class="mt-[5px] text-sm"><?php echo $userSaisie ?></p>
										<img class="w-8 h-8 rounded-full" src="./img/default_icon.png" alt="">
									</button>
								</a>
							</div>
				
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="px-2 mx-auto mt-12 max-w-7xl sm:px-6 lg:px-8">
			<section id="drive" class="">
				<!-- Header -->
				<div class="flex space-x-2 md:space-x-6">
					<a href="./drive.php">
						<button type="button" class="inline-flex items-center px-3 py-2 space-x-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16"> <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/> </svg>
							<p>Annuler</p>
						</button>
					</a>
					<h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Nouveau lien vidéo</h2>
					
				</div>

				<!-- Informations -->

				<form class="mt-16 space-y-6" id="particularsform" action="ajouter_video.php" method="post" enctype="multipart/form-data">

					<!-- Titre de la vidéo -->
					<div class="max-w-md">
						<label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Titre de la vidéo</label>
						<div class="mt-2">
							<input id="titre" name="titre" type="text" required class="px-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>

					<!-- Lien vidéo -->
					<div class="max-w-md">
						<label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Lien youtube</label>
						<div class="mt-2">
							<input id="lien" name="lien" type="text" required class="px-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>


					<!-- Confidentialité -->
					<div class="">
						<h3 class="pb-1.5 block text-sm font-medium leading-6 text-gray-900">Confidentialité</h3>
						<ul class="flex">
							<li class="">
								<input required type="radio" id="private" name="privacy" value="false" class="hidden peer">
								<label for="private" class="inline-flex flex-col items-center px-6 py-4 space-y-4 font-medium text-gray-600 rounded-md cursor-pointer bg-gray-50 peer-checked:bg-white text-md ring-1 peer-checked:text-black peer-checked:ring-black ring-inset ring-gray-500/10">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
									<path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
									<path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
									</svg>
									<p>Privé</p>
								</label>
							</li>
							<li>
								<input type="radio" id="public" name="privacy" value="true" class="hidden peer">
								<label for="public" class="inline-flex flex-col items-center px-5 py-4 ml-4 space-y-4 font-medium text-gray-600 rounded-md cursor-pointer bg-gray-50 peer-checked:bg-white text-md ring-1 peer-checked:text-black peer-checked:ring-black ring-inset ring-gray-500/10">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
										<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
										<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
									</svg>
									<p>Public</p>
								</label>
							</li>
						</ul>
					</div>


					<!-- Envoi du formulaire -->
					<div class="pt-5 md:pt-8">
						<button type="submit" class="max-w-[8rem] flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter</button>
					</div>
				</form>
				

					
				
			</section>
		</div>

	</body>
</html>
