function generar(){
    num = $('#numBtn').val();
    cod = "'use strict';\n";
    cod += "const AWS = require('aws-sdk');\n";
    cod += "const SNS = new AWS.SNS({ apiVersion: '2010-03-31' });\n";
    cod += "const PHONE_NUMBER = '573205000838'; // change it to your phone number\n";

    cod += "const http = require('https');\n";
    cod += "exports.handler = function(event, context, callback) {\n";
    cod += "var options = {";
      //host: 'www.random.org',
      //path: '/integers/?num=1&min=1&max=10&col=1&base=10&format=plain&rnd=new'
    cod += "host: 'elitee.co',\n";
    cod += "path: '/core/controllers/ingresarSolicitudController.php?num_boton="+num+"'\n";
    cod += "};\n";

    cod += "callback = function(response) {\n";
    cod += "var str = '';\n";

      //another chunk of data has been recieved, so append it to `str`
    cod += "response.on('data', function (chunk) {\n";
    cod += "str += chunk;\n";
    cod += "});\n";

      //the whole response has been recieved, so we just print it out here
    cod += "response.on('end', function () {\n";
    cod += "console.log(str);\n";

    cod += "const params = {\n";
    cod += "PhoneNumber: PHONE_NUMBER,\n";
    cod += "Message: str,\n";
    cod += "};";
        // result will go to function callback

    cod += "});\n";
    cod += "};\n";

    cod += "http.request(options, callback).end();\n";
    cod += "};\n";

    $('#contenido_textarea').html(cod);
}

function cancelar(){
    $('#contenido_textarea').html('');
}
