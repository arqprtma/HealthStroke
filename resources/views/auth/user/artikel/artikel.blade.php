<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    {{-- flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>

    <style>
        .flickity-page-dots {
            left: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            /* box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); */
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .cards {
            /* background: rgba(255, 255, 255, 0.44); */
            /* background: rgb(161, 237, 238);
            background: linear-gradient(0deg, rgba(161, 237, 238, 1) 0%, rgba(253, 45, 166, 1) 100%); */
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.3px);
            -webkit-backdrop-filter: blur(6.3px);
            border: 1px solid rgba(255, 255, 255, 1);
        }

        .bottom-menu {
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.3px);
            -webkit-backdrop-filter: blur(6.3px);
            border: 1px solid #ffffff;
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }
    </style>
</head>


<body class="width-[80%] mx-auto bg-[#FFF4E0]">

    {{-- modal --}}

    {{-- <div class="relative z-20" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <form action="" id="form-tigger">
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Trigger
                                        Stroke</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">

                                            <label for="" class="block mb-">Diabetes Meilitius</label>
                                            <input type="text"
                                                class="block appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <label for="" class="block pt-4">Hypertension / high blood
                                                pressure</label>
                                            <input type="text"
                                                class="block appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <label for="" class="block pt-4">Cardio Vascular</label>
                                            <input type="text"
                                                class="block appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button"
                            class="inline-flex w-full justify-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 sm:ml-3 sm:w-auto">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}

    {{-- ketika hipertensi  --}}

    {{-- end modal --}}

    {{-- navbar --}}
    {{-- <div class="w-[100%] h-[70px] flex justify-between border-b-2 ">
        <div class="pt-6 lg:ps-20 ps-10">
            <h1>Hai. Ariq Pratama</h1>
        </div>

        <div class="lg:pe-20 pt-6">
            <a href="{{ route('register') }}">
                <button class="pe-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
            </a>
            <a href="{{ route('login') }}">
                <button class="pe-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </a>

        </div>
    </div> --}}

    <nav class="fixed top-0 left-0 right-0 z-10 block bg-white border-gray-200 dark:bg-gray-900">
        <div class="w-[100%] flex flex-wrap items-center justify-between lg:justify-evenly mx-auto p-4">
            <div>
                <a href="#" class="flex items-center">
                    <img src="images/brain.png" class="h-8 mr-3" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Health
                        Stroke</span>
                </a>
            </div>
            <div class="flex items-center md:order-2">
                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/images/man.png" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">Ariq Pratama</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">ariqp63@gmail.com</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings
                                Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 hidden "
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white bg-[#FF6B6B] rounded md:bg-transparent md:text-[#FF6B6B] md:p-0"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#FF6B6B] md:p-0 dark:text-white md:dark:hover:text-[#FF6B6B] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#FF6B6B] md:p-0 dark:text-white md:dark:hover:text-[#FF6B6B] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Manajemen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- end navbar --}}

    {{-- navbar bottom for mobile  --}}

    <nav class="nav-bottom md:hidden w-[100%] h-[60px] bottom-[0.8rem] fixed z-10 ">
        <ul class="flex justify-center items-center h-[60px] bottom-menu">
            <li>
                <a href="" class="me-10">
                    <i class="uil uil-estate text-[30px] text-black"></i>
                </a>
            </li>
            <li>
                <a type="button" class="me-10 cursor-pointer" data-modal-target="profileModal"
                    data-modal-toggle="profileModal">
                    <i class="uil uil-user text-[30px] text-black"></i>
                </a>
            </li>
            <li>
                <a href="" class="">
                    <i class="uil uil-chart-bar text-[30px] text-black"></i>
                </a>
            </li>
            {{-- <li>
                <a href="">
                    <i class="uil uil-setting text-[30px] text-black"></i>
                </a>
            </li> --}}
        </ul>
    </nav>
    {{-- end navbar bottom --}}

    {{-- modal profile sub-user --}}




    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</body>


</html>
