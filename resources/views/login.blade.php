<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Health Stroke</title>
</head>

<body class="bg-[#FFF4E0]">
    <div
        class="card w-[450px] bg-white border-b-4 rounded-lg border-emerald-800 pb-5 p-10 absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h1 class="text-2xl font-bold text-center mb-5">Login</h1>
        {{-- Form --}}
        <form action="dashboard">
            <label for="" class="block mb-">Email</label>
            <input type="text"
                class="block appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <label for="" class="block pt-4">Password</label>
            <input type="text"
                class="block appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <button
                class="mt-10 hover:bg-[#FF6B7B] bg-[#FF6B6B] text-white font-bold py-3 w-full rounded focus:outline-none focus:shadow-outline">Submit</button>
        </form>

        <p class="text-center pt-10">Belum memiliki akun ? <a href="{{ route('register') }}"
                class="text-blue-800 underline">Daftar
                disini</a></p>
        <p class="text-center pt-10">Kembali ke <a href="{{ route('index') }}" class="text-blue-800">Dashboard</a></p>
    </div>
</body>

</html>
