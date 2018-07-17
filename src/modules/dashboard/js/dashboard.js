// Establish a connection to our push server
var connection = new autobahn.Connection({
    url: 'ws://127.0.0.1:7474',
    realm: 'default'
});

connection.onopen = function(session) {

    console.log('Connected');

    session.subscribe('chat', function(payload) {
        console.log("Payload:", payload[0]);
    });
};

// Establish a connection
connection.open();