<?php
session_start();
require('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@100..700&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Chonburi&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/output.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Kanit";
        }
    </style>
</head>

<body class="h-full min-h-screen w-full grid grid-rows-[auto,1fr,auto] md:grid-rows-[10vh,1fr,auto] justify-self-center">

    <!-- Navbar -->
    <nav class=" bg-black backdrop-blur-lg py-5 px-4 flex flex-col md:flex-row justify-between text-white sticky top-0 z-50">
        <!-- Brand -->
        <div class="md:text-4xl text-3xl self-center">
            <a href="index.php">Pongsakorn.F</a>
        </div>
        <!-- Menu link -->
        <div class="hidden md:flex self-center" id="menu-link">
            <ul class="md:flex md:gap-4 md:text-xl">
                <li class="menu-link"><a href="index.php">Home</a></li>
                <li class="menu-link"><a href="register-form.php">Register</a></li>
                <li class="menu-link"><a href="login-form.php">Log-in</a></li>
                <li class="menu-link"><a href="index.php?logout='true'">Log-out</a></li>
            </ul>
        </div>
        <!-- Hamburger menu toggle -->
        <div class="md:hidden flex justify-center my-2" id="menu-toggle">
            <button class="" onclick="menuToggle()">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile menu -->
        <div class="md:hidden hidden justify-center" id="mobile-menu">
            <ul class="gap-2 text-lg flex">
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10] hover:bg-white"><a href="index.php" class="text-white hover:text-black">Home</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10] hover:bg-white"><a href="register-form.php" class="text-white hover:text-black">Register</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10] hover:bg-white"><a href="login-form.php" class="text-white hover:text-black">Log-in</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10] hover:bg-white"><a href="index.php?logout='true'" class="text-white hover:text-black">Log-out</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container-fluid place-content-center bg-[url('https://cdn.pixabay.com/photo/2018/07/12/21/32/subscribe-3534409_960_720.jpg')] bg-cover bg-center bg-no-repeat ">
        <div class="justify-self-center bg-slate-500/70 shadow-imageShadow backdrop-blur-xl rounded-md flex flex-col w-3/4 md:w-2/4 h-auto px-5 py-2 shadow-black/60 my-8">
            <div class="flex flex-row self-center gap-2 mt-3">
                <h1 class="text-center text-2xl md:text-5xl font-semibold text-white">Log-in</h1>
                <svg class="md:size-12 size-6 self-center text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                </svg>
            </div>

            <!-- Login form -->
            <form action="login-db.php" method="POST">
                <?php include('errors.php') ?>
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="bg-red-700 my-3 p-2 ring ring-black rounded-md text-center text-white flex flex-col justify-self-center justify-center md:w-4/5 md:text-xl animate-vibrateX">
                        <h1 class="text-yellow-500 font-bold md:text-3xl bg-black rounded-xl">Alert !</h1>
                        <h1><?php echo $_SESSION['error'] ?></h1>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php } ?>
                <!-- Email -->
                <div class="my-2 md:text-2xl">
                    <label class="md:mx-5" for="email">E-mail :</label>
                    <input type="email" name="email" class="w-full text-center rounded-md">
                </div>
                <!-- Passwor -->
                <div class="my-2 md:text-2xl">
                    <label class="md:mx-5" for="password1">Password :</label>
                    <input type="password" name="password" class="w-full text-center rounded-md">
                </div>
                <div class="my-4 grid grid-cols-2 justify-self-center gap-2">
                    <h1 class="md:text-xl place-self-center text-center font-semibold text-white">Are you a member?</h1>
                    <a href="register-form.php" class="md:text-xl text-center p-2 bg-black text-white rounded-md hover:animate-vibrateX">Nahh ~</a>
                </div>
                <!-- Button -->
                <div class="my-2 md:text-xl flex gap-4 justify-evenly md:justify-self-center text-white">
                    <button type="submit" name="login-submit" class=" bg-[#378af0] rounded-md p-1 border-2 border-black shadow-2xl">Save</button>
                    <button type="reset" class="bg-[#fc2d1e] rounded-md p-1 border-2 border-black shadow-2xl">Clear</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="container-fluid bg-black z-50 grid grid-cols-2">
        <div class="mt-3 flex flex-col place-items-center col-span-2 md:col-span-1">
            <h2 class="text-center text-xl md:text-4xl font-bold text-skyBlue">Please! Contact Me</h2>
            <div class=" text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" size-6 md:size-8 m-2 text-skyBlue">
                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                </svg>
                <p class="text-lg md:text-2xl ">pattakor.f@gmail.com</p>
            </div>
            <div class=" text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" size-6 md:size-8 m-2 text-skyBlue">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <p class="text-lg md:text-2xl ">(+66)92-3839351</p>
            </div>
            <div class=" text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" size-6 md:size-8 m-2 text-skyBlue">
                    <path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z" />
                </svg>
                <p class="text-lg md:text-2xl ">Karon , Phuket 83100</p>
            </div>
        </div>
        <div class="mt-3 flex flex-col place-items-center col-span-2 md:col-span-1">
            <h2 class="text-center text-xl md:text-4xl font-bold text-skyBlue">Other sites</h2>
            <div class="h-full gap-5 flex place-items-center">
                <a href="https://github.com/PongsakornPattakor" target="_blank" class="p-2">
                    <button class="ring-2 ring-skyBlue rounded-md p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-skyBlue size-8 md:size-12">
                            <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"></path>
                            <path d="M9 18c-4.51 2-5-2-7-2"></path>
                        </svg>
                    </button>
                </a>
                <a href="https://www.linkedin.com/in/pongsakorn-pattakor/" target="_blank" class="p-2">
                    <button class="ring-2 ring-skyBlue rounded-md p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-skyBlue size-8 md:size-12">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect width="4" height="12" x="2" y="9"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div class="mb-2 place-items-center col-span-2 ">
            <h1 class="text-white md:text-lg">&#169; 2024 Pongsakorn Pattakor. All Right Reserved.</h1>

        </div>
    </footer>

    <script src="app.js"></script>
</body>

</html>