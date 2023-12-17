<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPT2 Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css
" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @if (auth()->check())

    <nav class="bg-teal-800 p-4">
        <div class="flex justify-between items-center">
            <div class="text-white font-bold text-xl">Final</div>
            <div class="hidden md:flex space-x-4 items-center">
                <div class="relative group text-white">
                    {{ Auth::user()->name }}
                    <button class="text-white focus:outline-none">
                        <svg class="h-4 w-4 ml-2 text-white group-hover:text-teal-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul class="absolute hidden space-y-2 bg-teal-800 text-white py-2 w-36 z-10 group-hover:block right-0">
                        <li><a href="/dashboard" class="block px-4 py-2 hover:bg-teal-700">Dashboard</a></li>
                        <li><a href="/cars" class="block px-4 py-2 hover:bg-teal-700">Car List</a></li>
                        @role('admin')
                        <li><a href="/logs" class="block px-4 py-2 hover:bg-teal-700">Logs</a></li>
                        @endrole
                        <li>
                            <form action="{{ url('/logout') }}" method="POST" class="ml-2">
                                {{ csrf_field() }}
                                <button type="submit" class="text-white px-3 py-2">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="md:hidden flex items-center">
                <button class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
                <ul class="absolute hidden space-y-2 bg-teal-800 text-white py-2 w-36 z-10">
                    <li><a href="/dashboard" class="block px-4 py-2 hover:bg-teal-700">Dashboard</a></li>
                    <li><a href="/profile" class="block px-4 py-2 hover:bg-teal-700">Profile</a></li>
                    <li><a href="/manage-users" class="block px-4 py-2 hover:bg-teal-700">Manage Users</a></li>
                    <li><a href="/user-logs" class="block px-4 py-2 hover:bg-teal-700">User Logs</a></li>
                    <li><a href="/logout" class="block w-full text-left px-4 py-2 hover:bg-teal-700">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>



    @endif
    @yield('content')
    @stack('scripts')
</body>
</html>


<style>
    .bg-teal-800 {
    background-color: #004d4d;
}

.text-white {
    color: #ffffff;
}

.hover\:bg-teal-700:hover {
    background-color: #003333;
}

.group:hover .group-hover\:block {
    display: block;
}

.group-hover\:text-teal-400:hover {
    color: #4fd1c5;
}


</style>
