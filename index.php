<?php
session_start();
require('dbconnect.php');
if (!isset($_SESSION['username'])) {
    header("location:login-form.php");
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location:login-form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pongsakorn.F web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@100..700&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Chonburi&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/output.css">
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        @media (max-width: 768px) {
            html {
                scroll-padding-top: 60px;
            }
        }

        @media (max-width: 480px) {
            html {
                scroll-padding-top: 196px;
            }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Kanit";
        }
    </style>
</head>

<body class="h-full min-h-screen w-full grid grid-rows-[auto,1fr,auto] md:grid-rows-[10vh,1fr,auto] bg-gradient-to-tl from-[#220e45] to-[#145885] bg-cover bg-no-repeat justify-self-center">

    <!-- Navbar -->
    <nav class=" bg-black/80 backdrop-blur-lg py-5 px-4 flex flex-col md:flex-row justify-between text-white sticky top-0 z-50">
        <!-- Brand -->
        <div class="md:text-4xl text-3xl self-center">
            <a href="index.php">Pongsakorn.F</a>
        </div>
        <!-- Menu link -->
        <div class="hidden md:flex self-center" id="menu-link">
            <ul class="md:flex md:gap-5 md:text-xl">
                <li class="menu-link"><a href="index.php">Home</a></li>
                <li class="menu-link"><a href="#profile">Profile</a></li>
                <li class="menu-link"><a href="#skills">Skills</a></li>
                <li class="menu-link"><a href="#experiences">Experience</a></li>
                <li class="menu-link"><a href="#contacts">Contacts</a></li>
                <li class="menu-link"><a href="register-form.php">Register</a></li>
                <li class="menu-link"><a href="index.php?logout='true'">Log-out</a></li>
            </ul>
        </div>
        <!-- Hamburger menu toggle -->
        <div class="md:hidden flex justify-center my-2" id="menu-toggle">
            <button onclick="menuToggle()">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile menu -->
        <div class="md:hidden hidden justify-center" id="mobile-menu">
            <ul class="gap-2 text-lg flex flex-wrap">
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10]"><a href="index.php" class="text-white ">Home</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10]"><a href="#profile" class="text-white ">Profile</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10]"><a href="#skills" class="text-white ">Skills</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10]"><a href="#experiences" class="text-white ">Experience</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10]"><a href="#contacts" class="text-white ">Contacts</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10]"><a href="register-form.php" class="text-white ">Register</a></li>
                <li class="text-center rounded-md p-1 transition-all duration-200 ease-in-out hover:scale-[1.10]"><a href="index.php?logout='true'" class="text-white ">Log-out</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container-fluid bg-black-800 bg-center bg-no-repeat bg-cover">
        <?php if (isset($_SESSION['username']) && isset($_SESSION['success'])) { ?>
            <!-- Welcom msg & Weather -->
            <header class="py-6 px-4 grid md:grid-cols-[35%,65%] bg-[url('https://cdn.pixabay.com/photo/2016/07/09/07/48/blue-sky-1505848_960_720.jpg')] bg-cover bg-no-repeat bg-center">
                <article class="bg-white/70 backdrop-blur-md rounded-xl shadow-black/60 shadow-imageShadow flex flex-col md:w-full h-fit justify-center flex-wrap pb-3 md:col-span-1 place-self-center my-2">
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-black text-white w-full p-3">Welcome</h1>
                    <h1 class="text-center text-2xl md:text-6xl mb-2 font-bold w-full p-3 text-waterBlue underline animate-pulse"><?php echo $_SESSION['username'] ?></h1>
                </article>
                <article class="bg-white/70 backdrop-blur-md rounded-xl shadow-black/60 shadow-imageShadow flex flex-col justify-center justify-self-center md:w-[90%] flex-wrap pb-3 md:col-span-1">
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-deepBlue text-white w-full p-3">Daily Weather</h1>
                    <div class="text-center my-2 p-2">
                        <label for="search" class="md:text-2xl font-bold text-lg">Province</label>
                        <input type="text" name="search-place" id="search-province" placeholder="Type province in TH" class="rounded-md ring-1 ring-black my-2 bg-white mx-3 p-1 text-center">
                        <button type="submit" id="confirm-search" class="rounded-md bg-black text-white py-1 px-2">Go!</button>
                    </div>
                    <div class="grid grid-cols-2 my-2 text-center px-3">
                        <!-- Temperature -->
                        <div class="col-span-1 md:text-3xl bg-white m-2 rounded my-2">
                            <h1 class="font-bold text-deepBlue">Temperature</h1>
                            <div>
                                <h1 id="temp-cel" class="text-center text-2xl md:text-5xl"></h1>
                            </div>
                        </div>
                        <!-- Humidity -->
                        <div class="col-span-1 md:text-3xl bg-white m-2 rounded my-2 ">
                            <h1 class="font-bold text-deepBlue">Humidity</h1>
                            <div>
                                <h1 id="humidity" class="text-center text-2xl md:text-5xl"></h1>
                            </div>
                        </div>
                        <!-- Weather condition -->
                        <div class="col-span-2 md:text-3xl bg-white m-2 rounded my-2 ">
                            <h1 class="font-bold text-deepBlue">Weather condition</h1>
                            <div>
                                <h1 id="condition" class="text-center text-2xl md:text-5xl"></h1>
                            </div>
                        </div>
                    </div>
                </article>
            </header>

            <!-- Profile -->
            <main class="py-6 px-4 grid md:grid-cols-6 bg-skyBlue relative" id="profile">
                <!-- Profile pic -->
                <picture data-faded-bottom class="md:w-[15vw] w-[30vw] place-self-center md:col-span-1 m-2 transtition-all duration-700 opacity-0">
                    <img src="./img/6D80E5D1-1C71-48B2-AF98-F276C4DA2856.jpg" alt="" class="rounded-xl hover:scale-[1.05] transition-all duration-500 shadow-imageShadow shadow-black/60">
                </picture>
                <!-- Personal info -->
                <article data-faded-top class="bg-white/70 hover:bg-white transition-all duration-700 backdrop-blur-md md:col-span-2 m-2 rounded-xl shadow-imageShadow shadow-black/60 opacity-0 relative">
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-waterBlue text-white w-full p-3">Pongsakorn Pattakor</h1>
                    <ul class="md:text-2xl pb-5 pr-8 pl-8">
                        <li><span class="font-bold">Nickname :</span> First (1st)</li>
                        <li><span class="font-bold">Age :</span> 26</li>
                        <li><span class="font-bold">Birth date :</span> 09/09/1998</li>
                        <li><span class="font-bold">Gender :</span> Male</li>
                        <li><span class="font-bold">Personalities :</span>
                            <ul class="list-[disc] list-inside md:text-lg">
                                <li>Calm</li>
                                <li>Friendly</li>
                                <li>Optimistic</li>
                                <li>Reasonable</li>
                            </ul>
                        </li>
                        <li><span class="font-bold">Languages :</span>
                            <ul class="list-[disc] list-inside md:text-lg ">
                                <li>Thai : Native</li>
                                <li>English : Good in reading & listening</li>
                                <li class="list-none ml-6 font-bold">
                                    <button class="bg-green-700 p-1 text-white rounded-md hover:animate-pulse" data-modal-target="modal-toeic" onclick="showModal()">TOEIC score = 625</button>
                                </li>
                            </ul>
                        </li>
                        <li><span class="font-bold">Educational backgrounds :</span>
                            <ul class="list-[disc] list-inside md:text-lg ">
                                <li>Bacheler degree : Prince of Songkhla University</li>
                                <li class="list-none ml-6">GPAX = 3.50 <strong>(First-class honor)</strong></li>
                                <li>High school eduction : Phuketwittayalai school</li>
                                <li class="list-none ml-6">GPAX = 3.17 </li>
                            </ul>
                        </li>
                    </ul>
                </article>
                <!-- About me -->
                <article data-faded-right class="bg-white/70 hover:bg-white transition-all duration-700 backdrop-blur-md md:col-span-3 m-2 rounded-xl shadow-imageShadow shadow-black/60 opacity-0 h-fit">
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-waterBlue text-white w-full p-3">About Me</h1>
                    <div class="flex flex-col place-self-center pb-5 pr-8 pl-8">
                        <p class="text-xl md:text-2xl my-4"> <span class="md:text-4xl text-3xl">Nice to meet you,</span> my name is Pongsakorn Pattakor.
                            I am highly interested in <strong>programming</strong> and <strong>development</strong>. Although my academic background is not directly related to this field,
                            but I am confident in my ability to transfer in this career through skills and the experience I have gained in other areas.
                        </p>
                        <p class="text-xl md:text-2xl my-4">To begin my journey in Front-end Development, I have studied essential fundamental knowledges that include
                            <span class="underline font-bold"> Java (as an introductory language), HTML5, CSS, JavaScript, PHP, SQL and APIs. </span>
                            Additionally, I have worked with tools such as <span class="underline font-bold">VSCode, TailwindCSS , Git&GitHub and XAMPP.</span>
                        </p>
                        </p>
                        <p class="text-xl md:text-2xl my-4"> If given the opportunity to work in this field, I am eager to improve my programming skills along with learn additional languages and technologies that will be useful to the company.
                            I am looking forward to gain the valuable work experience in this field to improve my potential and advance my career.
                        </p>
                    </div>
                </article>
                <!-- Modal toeic -->
                <div class="absolute p-8 md:bg-slate-600/60 top-1/4 md:top-0 w-fit h-fit md:h-full md:w-full z-30 justify-center transition-all duration-500 ease-in-out opacity-0 hidden" id="modal-toeic">
                    <div class="flex flex-col content-center justify-center md:w-1/2 bg-black/70 backdrop-blur-lg rounded-xl p-4">
                        <div class="my-2">
                            <h2 class="font-semibold md:text-2xl w-[50vw] text-white">My TOEIC score report :</h2>
                        </div>
                        <div class="my-2">
                            <img src="./img/toeic.jpg" class="rounded-xl" alt="">
                        </div>
                        <div class="my-2 text-center">
                            <button class=" md:text-2xl rounded-md p-2 bg-skyBlue text-white inline-block" dat-close-modal="modal-toeic" id="close-modal">Close</button>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Skills -->
            <main class="py-6 px-4 grid md:grid-cols-2 bg-waterBlue" id="skills">
                <!-- Technical -->
                <article data-faded-left class=" bg-white/70 hover:bg-white transition-all duration-700 backdrop-blur-md md:col-span-1 md:row-span-2 m-2 rounded-xl shadow-imageShadow shadow-black/60 opacity-0 h-fit self-center">
                    <!-- Programming skills -->
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-black text-skyBlue w-full p-3">Programming skills</h1>
                    <div class="justify-self-center flex justify-evenly flex-wrap">
                        <img src="./png/java icon.png" title="Java" alt="" class="size-[15%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/html5 icon.png" title="HTML5" alt="" class="size-[15%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/css icon.png" title="CSS3" alt="" class="size-[15%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/Javascript icon.png" title="JavaScript" alt="" class="size-[15%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/php icon.png" title="PHP" alt="" class="size-[15%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                    </div>
                    <!-- Tools -->
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold bg-black text-skyBlue w-full p-3">Tools</h1>
                    <div class="justify-self-center flex gap-3 justify-evenly flex-wrap">
                        <img src="./png/vscode logo.png" title="VS code" alt="" class="size-[12%] my-1 hover:scale-[1.10] duration-200 place-self-center">
                        <img src="./png/tailwind logo.png" title="Tailwind CSS" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center">
                        <img src="./png/bootstrap logo.png" title="Bootstrap" alt="" class="size-[10%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/mysql icon.png" title="MySQL" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center">
                        <img src="./png/chatgpt logo.png" title="ChatGPT" alt="" class="size-[10%] my-1 hover:scale-[1.10] duration-200 place-self-center">
                        <img src="./png/xampp logo.png" title="XAMPP" alt="" class="size-[10%] my-1 hover:scale-[1.10] duration-200 place-self-center">
                        <img src="./png/git.png" title="Git" alt="" class="size-[10%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                    </div>
                    <!-- Other programs -->
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold  bg-black text-skyBlue w-full p-3">Other programs</h1>
                    <div class="justify-self-center flex gap-5 justify-center flex-wrap ">
                        <img src="./png/obs icon.png" title="OBS studio" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/premiere logo.png" title="Adobe PremierePro" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/canva logo.png" title="Canva" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/Word.png" title="Microsoft Word" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/Powerpoint.png" title="Microsoft PowerPoint" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                        <img src="./png/Excel.png" title="Microsoft Excel" alt="" class="size-[13%] my-1 hover:scale-[1.10] duration-200 place-self-center rounded-full">
                    </div>
                </article>
                <!-- Soft -->
                <article data-faded-right class="bg-white/70 hover:bg-white transition-all duration-700 backdrop-blur-md md:col-span-1 md:row-span-1 m-2 rounded-xl  shadow-imageShadow shadow-black/60 opacity-0 h-fit ">
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-black text-skyBlue w-full p-3">Soft skills</h1>
                    <div class="flex justify-evenly my-2 flex-wrap gap-2">
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png/fast learning.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-deepBlue text-white rounded-md">Fast Learning</h2>
                        </div>
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png//collaborative.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-deepBlue text-white rounded-md">Collaboration</h2>
                        </div>
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png/Critical thinking.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-deepBlue text-white rounded-md">Critical Thinking</h2>
                        </div>
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png/negotiation.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-deepBlue text-white rounded-md">Negotiation</h2>
                        </div>
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png/adaptation.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-deepBlue text-white rounded-md">Adaptation</h2>
                        </div>
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png/problem solving.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-deepBlue text-white rounded-md">Problem Solving</h2>
                        </div>
                    </div>
                </article>
                <!-- Special -->
                <article data-faded-right class="bg-white/70 hover:bg-white transition-all duration-700 backdrop-blur-md md:col-span-1 md:row-span-1 m-2 rounded-xl  shadow-imageShadow shadow-black/60 opacity-0 h-fit ">
                    <h1 class="text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-black text-skyBlue w-full p-3">Special skills</h1>
                    <div class="flex justify-evenly my-2 flex-wrap gap-2">
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png/touch typing.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-skyBlue rounded-md">Touch typing</h2>
                        </div>
                        <div class="md:w-1/4 w-1/3 justify-items-center">
                            <img src="./png/computer hardware.png" alt="" class="my-1 w-1/2">
                            <h2 class="text-center font-bold md:text-xl p-1 bg-skyBlue rounded-md">PC D.I.Y building</h2>
                        </div>
                    </div>
                </article>
            </main>

            <!-- Working experience -->
            <main class="py-6 px-4 grid md:grid-cols-5 bg-grayBlue" id="experiences">
                <article data-faded-top class=" bg-white/70 hover:bg-white transition-all duration-700 backdrop-blur-md md:col-span-3 m-2 rounded-xl shadow-imageShadow shadow-black/60 opacity-0 ">
                    <h1 class=" text-center text-3xl md:text-4xl mb-2 font-bold rounded-t-lg bg-seaBlue text-white w-full p-3">Working experiences</h1>
                    <h2 class="text-center text-3xl md:text-4xl font-bold text-waterBlue">Medical Science Research & Innovation Institute</h2>
                    <h2 class="text-center text-xl md:text-2xl font-bold">Sep 2021 - Present</h2>
                    <ol class="justify-self-center list-disc text-xl md:text-2xl flex-wrap list-inside p-4 mx-6 text-deepBlue">
                        <li>Prepared the laboratory for ISO/IEC 17025: 2017 accreditation.</li>
                        <li>Participated in Proficiency Testing programs (PT) to assess and enhance laboratory performance.</li>
                        <li>Participated in the annual internal audit.</li>
                        <li>Verified testing methods to ensure accuracy and reliability.</li>
                        <li>Managed quality control of testing processes from start to finish in the laboratory.</li>
                        <li>Perform microbiological analysis according to the British Pharmacopoeia 2022 standards.</li>
                        <li>Prepared documentation for pathogen acquisition in compliance with the Communicable Disease and Animal Toxins Act (2015).</li>
                        <li>Developed and documented testing procedures by translating standards from the British Pharmacopoeia 2022.</li>
                        <li>Reviewed and verified calibration results to ensure compliance with laboratory acceptance criteria.</li>
                        <li>Improve the testing procedures to make them simpler, more convenient, and faster, while maintaining compliance with standards.</li>
                    </ol>
                </article>

                <!-- My hometown view -->
                <article data-faded-bottom class="bg-white/70 hover:bg-white transition-all duration-700 backdrop-blur-md md:col-span-2 m-2 rounded-xl  shadow-imageShadow shadow-black/60 opacity-0 h-fit self-center">
                    <h1 class="text-center text-3xl md:text-4xl font-bold rounded-t-lg bg-seaBlue text-white w-full p-3">My Hometown views</h1>
                    <div id="indicators-carousel" class="relative w-full ">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden md:h-[500px] rounded-b-lg">
                            <!-- Item 1 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/charter bank.jpg" class="absolute rounded-lg block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                            <!-- Item 2 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/pkt museum.jpg" class="absolute rounded-lg block w-full -translate-x-1/2 -translate-y-1/3 top-1/2 left-1/2">
                            </div>
                            <!-- Item 3 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/pkt thaihua.jpg" class="absolute rounded-lg block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                            <!-- Item 4 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/Big buddha.jpg" class="absolute rounded-lg block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                            <!-- Item 5 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/Lham-sai.jpg" class="absolute rounded-lg block w-full scale-[1.10] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                            <!-- Item 6 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/PhromThep.jpg" class="absolute rounded-lg block w-full  -translate-x-1/2 -translate-y-[60%] top-1/2 left-1/2">
                            </div>
                            <!-- Item 7 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/kata beach.jpg" class="absolute rounded-lg block w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                            <!-- Item 7 -->
                            <div class="duration-700 ease-in-out transition-all opacity-0" data-carousel-item>
                                <img src="./img/aquaria.jpg" class="absolute rounded-lg block w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center size-6 md:size-10 rounded-full bg-white group-hover:bg-black  group-focus:ring-4 group-focus:ring-black  group-focus:outline-none">
                                <svg class="md:size-5 size-4 text-skyBlue rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center size-6 md:size-10 rounded-full bg-white group-hover:bg-black  group-focus:ring-4 group-focus:ring-black  group-focus:outline-none">
                                <svg class="md:size-5 size-4 text-skyBlue rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </article>
            </main>
        <?php } ?>
    </main>

    <!-- Footer -->
    <footer class="container-fluid bg-black z-50 grid grid-cols-2" id="contacts">
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
    <script src="api.js"></script>
</body>

</html>