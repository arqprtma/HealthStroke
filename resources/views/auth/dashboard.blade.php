<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>

    <style>
        .flickity-page-dots {
            left: 0;
        }
    </style>
</head>


<body>

    {{-- modal --}}

    {{-- <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

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


    {{-- end modal --}}

    {{-- navbar --}}
    <div class="w-[100%] h-[70px] flex justify-between border-b-2 ">
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
    </div>
    {{-- end navbar --}}

    {{-- card --}}
    <h1 class="text-center mt-5 lg:mt-10 text-lg lg:text-2xl text-bold">Profile Saudara</h1>

    <div class="cards lg:w-[80%] p-8 lg:p-20 bg-emerald-500 mx-auto mt-10 rounded-lg h-auto relative"
        data-flickity='{ "cellAlign": "left", "contain": true }'>
        <a href="" class="w-[40%] h-[150px] lg:h-[250px]">
            <div class="card bg-slate-100 w-[100%] h-[150px] lg:h-[250px] rounded-lg p-10 me-2 text-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="lg:w-20 w-10 lg:h-20 h-10 mx-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>
                <h1 class="lg:text-lg lg:mt-10 mt-2">Tambah Profile User</h1>
            </div>
        </a>
        {{-- <div class="card bg-slate-100 w-[40%] h-[300px] rounded-lg p-10 me-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos omnis cumque quo fugiat voluptatum
            laboriosam doloremque officia dolore voluptas ad ipsam blanditiis, excepturi reiciendis, nihil tempora hic
            ullam minima delectus.
        </div>
        <div class="card bg-slate-100 w-[40%] h-[300px] rounded-lg p-10 me-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos omnis cumque quo fugiat voluptatum
            laboriosam doloremque officia dolore voluptas ad ipsam blanditiis, excepturi reiciendis, nihil tempora hic
            ullam minima delectus.
        </div>
        <div class="card bg-slate-100 w-[40%] h-[300px] rounded-lg p-10 me-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos omnis cumque quo fugiat voluptatum
            laboriosam doloremque officia dolore voluptas ad ipsam blanditiis, excepturi reiciendis, nihil tempora hic
            ullam minima delectus.
        </div>
        <div class="card bg-slate-100 w-[40%] h-[300px] rounded-lg p-10 me-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos omnis cumque quo fugiat voluptatum
            laboriosam doloremque officia dolore voluptas ad ipsam blanditiis, excepturi reiciendis, nihil tempora hic
            ullam minima delectus.
        </div>
        <div class="card bg-slate-100 w-[40%] h-[300px] rounded-lg p-10 me-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos omnis cumque quo fugiat voluptatum
            laboriosam doloremque officia dolore voluptas ad ipsam blanditiis, excepturi reiciendis, nihil tempora hic
            ullam minima delectus.
        </div> --}}
    </div>
    {{-- end card --}}

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

</body>


</html>
