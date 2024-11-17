<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Template</title>

        @vite('resources/css/app.css')

        <link rel="stylesheet" type="text/css" href="{{ asset('css/loading-bar.min.css') }}" />
        <script type="text/javascript" src="{{ asset('js/loading-bar.min.js') }}"></script>
        <style type="text/css">
            .ldBar-label {
                color: #09f;
                font-size: 1.2em;
                font-weight: 700;
            }

            .ldBar path.mainline {
                stroke-width: 10;
                stroke: #09f;
                stroke-linecap: round;
            }

            .ldBar path.baseline {
                margin: 5px;
                stroke-width: 14;
                stroke: #f1f2f3;
                stroke-linecap: round;
                filter: url(#custom-shadow);
            }
        </style>
    </head>

    <body>
        <h1>Desain Alert</h1>
        <div>
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg" role="alert">
                <span class="font-medium">Success!</span> This is a green alert — check it out!
            </div>

            <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg" role="alert">
                <span class="font-medium">Error!</span> This is a red alert — check it out!
            </div>

            <div class="p-4 mb-4 text-orange-700 bg-orange-100 rounded-lg" role="alert">
                <span class="font-medium">Warning!</span> This is an orange alert — check it out!
            </div>
        </div>

        <hr>
        <h1>Desain Form</h1>
        <div>
            <div class="max-w-lg mx-auto mt-4 p-6 bg-white rounded-lg shadow-md">
                <form>
                    <!-- Input Text -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan nama">
                    </div>

                    <!-- Input Number -->
                    <div class="mb-4">
                        <label for="age" class="block text-sm font-medium text-gray-700">Umur</label>
                        <input type="number" id="age" name="age" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan umur">
                    </div>

                    <!-- Input Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan email">
                    </div>

                    <!-- Textarea -->
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan pesan Anda"></textarea>
                    </div>

                    <!-- Select Option -->
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Piplihan</label>
                        <div class="relative">
                            <select id="dedicion" name="decision" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline focus:border-[#15ADA7]">
                                <option value="">-- Pilih --</option>
                                <option value="ya">Ada Perkembangan</option>
                                <option value="tidak">Tidak ada Perkembangan</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Radio Buttons -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <div class="flex items-center mt-2">
                            <input type="radio" id="male" name="gender" value="male" class="focus:ring-[#15ADA7] h-4 w-4 text-[#15ADA7] border-gray-300">
                            <label for="male" class="ml-2 text-sm text-gray-700">Laki-laki</label>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="radio" id="female" name="gender" value="female" class="focus:ring-[#15ADA7] h-4 w-4 text-[#15ADA7] border-gray-300">
                            <label for="female" class="ml-2 text-sm text-gray-700">Perempuan</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="w-full px-4 py-2 bg-[#15ADA7] text-white rounded-md hover:bg-[#1d8b88] focus:outline-none focus:bg-[#1d8b88]">Kirim</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>
        <h1>Card Progress</h1>
        <div>
            <div class="max-w-sm mx-auto p-6 bg-white rounded-lg shadow-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Decision Progress</h2>
                    <span class="text-gray-600 text-sm">Status: <span id="status-text" class="text-green-500 font-medium">In Progress</span></span>
                </div>
                <div class="flex justify-between items-center gap-2 relative">
                    <!-- Progress Circle -->
                    <div>
                        <div class="ldBar label-center" data-value="50" data-preset="circle" style="width: 100px;height: 90px;"></div>
                        <style>
                            .ldBar-label:after {
                                content: " / 100";
                            }
                        </style>
                    </div>
                    <p class="mt-4 text-gray-600">
                        This decision is currently being reviewed. Please proceed with necessary actions.
                    </p>
                </div>
            </div>

            <script></script>

        </div>
    </body>

</html>
