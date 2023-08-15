const WebSocket = require("ws");
const WebSocketServer = require("ws/lib/websocket-server");

const wss = new WebSocket.Server({ port: 5500 });

wss.on("connection", ws =>{
    console.log("New client connected!");

    ws.on("close", () =>{
        console.log("Client has disconnected!");
    });

});