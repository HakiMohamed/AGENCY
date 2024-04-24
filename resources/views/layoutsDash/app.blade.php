<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #00B98E;;
        }

        .cta-btn {
            color: #00B98E;;
        }

        .upgrade-btn {
            background: #00B98E;;
        }

        .upgrade-btn:hover {
            background: #00B98E;;
        }

        .active-nav-link {
            background: #00B98E;;
        }

        .nav-item:hover {
            background: #00B98E;;
        }

        .account-link:hover {
            background: #00B98E;;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative text-white bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/dashboard" class=" text-3xl font-semibold uppercase  hover:text-gray-300">
                AGENCY PANEL
            </a>
            
        </div>
        @include('layoutsDash.nav')

        <a href="https://wa.me/+212641725930" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Contacter Nous
        </a>
    </aside>

   
    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">

                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    @if($admin->avatar)
                    
                    <img src="{{ asset($admin->avatar) }}" alt="Current Avatar"  >
                
                    @endif
                </button>

                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default">

                </button>

                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 account-link hover:text-white">Profile</a>
                    <form action="{{ route('logout') }}" method="post" class="dropdown-item block px-4 py-2 account-link hover:text-white">
                        @csrf
                        <button type="submit" class="btn ">Logout</button>
                    </form>                </div>
            </div>
        </header>

        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin Agency</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

           @include('layoutsDash.nav')
            
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                     @endif
                @yield('content')
            </main>

           
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>