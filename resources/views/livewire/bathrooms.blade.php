<script>
    var bathroomIcon = L.icon({
        iconUrl: '/icons/toilet.png',
        iconSize: [24, 24],
    });

    // Prepare the bathroom data in a JSON format
    var bathroomsData = @json($bathrooms);
    console.log(bathroomsData);
    // Loop through the data and create markers
    bathroomsData.forEach(function(bathroom) {
        L.marker([bathroom.latitude, bathroom.longitude], {icon: bathroomIcon})
            .addTo(map)
            .on('click', function() {
                Livewire.emit('showBathroomDetails', {
                    'id': bathroom.id,
                    'name': bathroom.name,
                    'address': bathroom.address,
                    'image': bathroom.image,
                    'reviews': bathroom.reviews,
                    'amenities': bathroom.amenities
                });
                toggleSidebar();
            });
    });
</script>
