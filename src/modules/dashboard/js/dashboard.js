// Establish connection
var socket = new WebSocket('ws://localhost:8080');

socket.onopen = function(e) {
    socket.send(JSON.stringify({
        event : 'joined',
        data : {
            user : {
                id : 1,
                name : 'John'
            }
        }
    }));

};