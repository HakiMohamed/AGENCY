<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    @if (session('error'))
       <script>
           Swal.fire({
               position: "top-end",
               icon: "error",
               title: "{{ session('error') }}",
               showConfirmButton: false,
               timer: 1500
           });
       </script>
    @endif

    <div class="container mx-auto mt-5">
        <div class="max-w-lg mx-auto my-10 bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md mt-24">

            <h1 class="text-2xl font-semibold mb-5 text-center dark:text-white-700 text-blue-700">Login</h1>
            <form class="p-5" action="{{ route('login') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-4 ">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" placeholder="Email.." id="email" name="email" autocomplete="username" class="mt-1 p-2.5 block w-full rounded-md border border-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100 dark:bg-gray-700 dark:text-gray-100" required>
                </div>
                <div class="mb-4 ">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input type="password" placeholder="Password.." id="password" name="password" autocomplete="current-password" class="mt-1 p-2.5 block w-full rounded-md border border-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100 dark:bg-gray-700 dark:text-gray-100" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Login</button>
                    <a href="{{ route('register') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Create an account</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
