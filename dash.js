var dash_button = require('node-dash-button');
var request = require('request');
var dash = dash_button("ac:63:be:50:52:dc", null, null, 'all'); //address from step above

dash.on("detected", function (){
    request('http://led.jjpmann.com/api.php?toggle');
});