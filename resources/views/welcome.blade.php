@extends('layouts.app')

@section('content')
    <div class="relative" style="height: 100vh; width: 100vw;">
        <div id="map" class="absolute top-0 left-0 w-full h-full z-10"></div>

        <div id="sidebar"
            class="absolute top-0 left-0 w-64 h-full bg-white border-r overflow-auto transform -translate-x-full transition-transform duration-300 ease-in-out z-20">
            <div class="p-4 flex justify-end">
                <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
            <!-- Bathroom details will be displayed here -->
            @livewire('bathroom-details')

        </div>
    </div>


    <script>
        var map = L.map('map').setView([23.5859, 58.4059], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Toggle function for the sidebar
        var isSidebarVisible = false;

        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            if (isSidebarVisible) {
                sidebar.style.transform = 'translateX(100%)';
                sidebar.style.display = 'none';
            } else {
                sidebar.style.display = 'block';
                sidebar.style.transform = 'translateX(0%)';
            }
            isSidebarVisible = !isSidebarVisible;
        }
    </script>
    @livewire('bathrooms')
@endsection
