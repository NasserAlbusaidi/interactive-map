<!-- header.blade.php -->
<nav class="bg-blue-500 text-white shadow-md">
    <div class=" mx-auto px-4 py-2 flex justify-between">
        <div class="flex-grow justify-start ">
            <a href="/" class="text-2xl font-bold ml-2">💩</a>

            @auth
                <a href="{{ route('bathroom.create') }}" class="text-white hover:text-blue-300 ml-3">Add Bathroom</a>
                <a href="{{ route('logistic-calculator') }}" class="text-white hover:text-blue-300 ml-3"> Calculator</a>
                <a href="{{ route('questions.index') }}" class="text-white hover:text-blue-300 ml-3"> Questions</a>
                <a href="{{ route('meetings.index') }}" class="text-white hover:text-blue-300 ml-3"> Meetings</a>

            @endauth
        </div>
        <div class="space-x-4 mr-2 mt-1">
            @guest
                <a href="{{ route('login') }}" class="text-white hover:text-blue-300">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:text-blue-300">Register</a>
            @else
                <span class="text-white">{{ Auth::user()->name }}</span>

                <a href="{{ route('logout') }}" class="text-white hover:text-blue-300"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</nav>
