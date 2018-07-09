// Establish connection
var conn = new WebSocket('ws://localhost:8080');

// Handle on open functionality
conn.onopen = function(e) {
    console.log("Connection established!");
};

// Handle incoming messages
conn.onmessage = function(e) {
    console.log(e.data);
};