@extends('layouts.app')

@section('content')

<div>
    <video id="localVideo" autoplay></video>
    <video id="remoteVideo" autoplay></video>
    <input type="text" id="iceConfig" value="{{ $meeting->ice_config }}" hidden>
    <input type="hidden" id="currentUserId" value="{{ Auth::user()->id }}">

    <button id="startButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Start</button>
    <bu id="hangupButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hangup</button>

    <script>
        const unparsedValue = document.getElementById('iceConfig').value;
        const iceConfig = JSON.parse(unparsedValue);
        const configuration = { iceServers: [iceConfig] };
        const peerConnection = new RTCPeerConnection(configuration);

        navigator.mediaDevices.getUserMedia({ video: true, audio: true })
            .then(stream => {
                const localVideo = document.getElementById('localVideo');
                localVideo.srcObject = stream;
                stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
            })
            .catch(error => console.error(error));

        peerConnection.ontrack = event => {
            const remoteVideo = document.getElementById('remoteVideo');
            remoteVideo.srcObject = event.streams[0];
        };

        peerConnection.onicecandidate = event => {
            if (event.candidate) {
                // Send the candidate to the remote peer
                const iceCandidate = new RTCIceCandidate(event.candidate);
                const offer = JSON.stringify(peerConnection.localDescription);
                // Send the ice candidate and offer to the remote peer using an HTTP request or a WebSocket
            }
        };

        document.getElementById("startButton").addEventListener("click", () => {
            peerConnection.createOffer()
                .then(offer => peerConnection.setLocalDescription(offer))
                .then(() => {
                    console.log(peerConnection.localDescription);
                    const offer = JSON.stringify(peerConnection.localDescription);

                });
        });

        document.getElementById("hangupButton").addEventListener("click", () => {
            peerConnection.close();
        });
    </script>
</div>
@endsection
