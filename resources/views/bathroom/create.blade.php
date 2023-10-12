@include('layouts.app')

<div class="container mx-auto align-middle">
    <h1 class="text-4xl mb-8 pt-2 text-center">Create a New Bathroom</h1>

    <form action={{ route('bathroom.store') }} method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded">
        @csrf <!-- CSRF token for security -->

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
            <input type="text" id="name" name="name" required class="mt-1 p-2 w-full rounded-md border">
        </div>

        <!-- Address Field -->
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-600">Address:</label>
            <input type="text" id="address" name="address" required class="mt-1 p-2 w-full rounded-md border">
        </div>

        <!-- Latitude Field -->
        <div class="mb-4 hidden">
            <label for="latitude" class="block text-sm font-medium text-gray-600">Latitude:</label>
            <input type="number" step="any" id="latitude" name="latitude" required
                class="mt-1 p-2 w-full rounded-md border">
        </div>

        <!-- Longitude Field -->
        <div class="mb-4 hidden">
            <label for="longitude" class="block text-sm font-medium text-gray-600">Longitude:</label>
            <input type="number" step="any" id="longitude" name="longitude" required
                class="mt-1 p-2 w-full rounded-md border">
        </div>

        <!-- Map for location picker -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Pick a Location:</label>
            <div id="map" style="height: 400px;" class="mt-2 rounded border"></div>
        </div>

        {{-- Image Field --}}
        <div class="mb-4">
            <label for="photos" class="block text-sm font-medium text-gray-600">Photos:</label>
            <input type="file" id="photos" name="photos[]" multiple class="mt-1 p-2 w-full rounded-md border">
        </div>

        <!-- Submit Button -->
        <div class="mb-4 text-center">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">
                Create Bathroom
            </button>
        </div>
    </form>
</div>
<script>
    // Initialize the map
    var map = L.map('map').setView([23.5859, 58.4059], 13);
    var marker;
    // Add tiles to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Add click event to get latitude and longitude
    map.on('click', function(e) {
        var latitude = e.latlng.lat;
        var longitude = e.latlng.lng;

        // Place a marker on the map
        if (marker) {
        map.removeLayer(marker);
    }

    // Add a new marker at the clicked coordinates
    marker = L.marker([latitude, longitude]).addTo(map);

        // Update the form fields with the clicked coordinates
        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;
    });
</script>
