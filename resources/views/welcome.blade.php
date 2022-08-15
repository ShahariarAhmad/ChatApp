<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    {{-- @vite('resources/css/app.css') --}}


</head>

<body class="p-8">
    <div class="flex space-x-2 justify-center">
        @if (!auth()->check())
            
      
        <div>
 
                <a href="{{ route('loginOne') }}" type="button"
                    class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight  rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Login
                    as Musafir</a>
         
            
                <a href="{{ route('loginTwo') }}" type="button"
                    class="inline-block px-6 py-2.5 bg-purple-800 text-white font-medium text-xs leading-tight  rounded shadow-lg hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Login
                    as Beduyen</a>
          
        </div>
        @endif
        @if (auth()->check())
            <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <p class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight  rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">   Logged in as :   {{ auth()->user()->name }}
                    </p>
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight  rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Logout</button>
                </form>
            </div>
        @endif
       
            
    </div>
    <br>
    <div class="flex space-x-2 justify-center mb-5">
        Instructions :
        <br> 
        <ol>
            <li>1. You must seed the DB. ( php artisan migrate:fresh --seed )</li>
            <li>2. Open a normal browser tab and login.</li>
            <li>3. Open a browser incognito tab and login with the another account.</li>
            <li>4. <strong>Don't forget to update .ENV variables related to Pusher Channel. Without it, App won't work.</strong></li>

          
        </ol>
        
    </div>
   
    @if (auth()->check())
    <div id="home"></div>
    @endif
   

    @vite('resources/js/app.js')
</body>

</html>
