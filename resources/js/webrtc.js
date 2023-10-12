
let users = {};
document.addEventListener('DOMContentLoaded', (event) => {
    // Your STUN and TURN servers, this should be fetched dynamically from your Laravel backend
    const iceConfig = JSON.parse(document.getElementById('iceConfig').value);

    // WebRTC setup
    const configuration = { iceServers: [iceConfig] };
    const peerConnection = new RTCPeerConnection(configuration);

    // Get local media stream
    navigator.mediaDevices.getUserMedia({ video: true, audio: true })
        .then(stream => {
            const localVideo = document.getElementById('localVideo');
            localVideo.srcObject = stream;

            // Add tracks to the connection
            stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
        })
        .catch(error => console.error('Error accessing media devices.', error));

    // Listen for remote media stream and add to remote video element
    peerConnection.ontrack = event => {
        const remoteVideo = document.getElementById('remoteVideo');
        remoteVideo.srcObject = event.streams[0];
    };

    // Handle ICE Candidate events
    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            // Send this candidate to the other peer via your server
            // Replace this with your signaling logic
            axios.post('/meeting/signal', {
                meetingId: meetingId,
                message: JSON.stringify({'ice-candidate': event.candidate})
            });
        }
    };



    Echo.join(`meeting`)
    // ... Existing code
    .joining((user) => {
        // When a new user joins, create a new PeerConnection for them
        const peerConnection = new RTCPeerConnection(configuration);
        // Add all the necessary event listeners here
        users[user.id] = peerConnection;
    })
    .leaving((user) => {
        // Remove the PeerConnection for the user who left
        if(users[user.id]) {
            users[user.id].close();
            delete users[user.id];
        }
    })
    .listen('MeetingSignalSent', (event) => {
        const userId = event.userId;
        const message = event.message;

        if (userId === currentUserId) {
            return;
        }

        // Handle the incoming message using the corresponding PeerConnection
        const peerConnection = users[userId];
        // Do something with the message and peerConnection
    });

});
