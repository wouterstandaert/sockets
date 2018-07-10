// Establish connection
var socket = new WebSocket('ws://localhost:8080');

socket.send(JSON.stringify({
    event : 'joined',
    data : {
        user : {
            id : 1,
            name : 'John'
        }
    }
}));