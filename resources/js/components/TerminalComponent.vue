<template>
    <div class="py-2">
        <div name="idconn" id="idconn"></div>
        <div id="terminal" style="width:100%; height:350px"></div>
    </div>

</template>

<script>
import { Terminal } from 'xterm';
import { AttachAddon } from 'xterm-addon-attach';

export default {

    mounted() {
        var resizeInterval;
        const wSocket = new WebSocket("ws:localhost:8090");
        const attachAddon = new AttachAddon(wSocket);
        let term = new Terminal();
        var password;
        var idconnection = "<?= bin2hex(openssl_random_pseudo_bytes(12)) ?>";
        var intervalId;
        term.loadAddon(attachAddon);
        term.open(document.getElementById('terminal'));
        document.getElementById("terminal").style.visibility="visible";
        var dataSend = {"auth":
                {
                    "idconnection" : idconnection,
                    "server":"host.docker.internal",
                    "port":"22",
                    "user":"igorhaf",
                    "password":'Tatyruga@2008',
                }
        };
        term.focus();
        wSocket.onopen = function (event) {
            wSocket.send(JSON.stringify(dataSend));

            intervalId = window.setInterval(function(){
                wSocket.send(JSON.stringify({"refresh":""}));
            }, 700);
        };
        wSocket.onerror = function (event){
            alert("Connection Closed");
            //term.deattach(wSocket);
            window.clearInterval(intervalId);
        };
        term.onData(function (data) {
            var dataSend = {"data":{"data":data}};

            wSocket.send(JSON.stringify(dataSend));
            if (data=="0"){
                term.write(data);
            }
        });
        async function decrypt() {
            let passwordDecrypt;
            passwordDecrypt = document.getElementById("decryptpassword").value;
            const pwUtf8 = new TextEncoder().encode(passwordDecrypt);                                  // encode password as UTF-8
            const pwHash = await crypto.subtle.digest('SHA-256', pwUtf8);                       // hash the password
            let ciphertext;
            ciphertext = "{{$password}}";
            const iv = ciphertext.slice(0,24).match(/.{2}/g).map(byte => parseInt(byte, 16));   // get iv from ciphertext
            const alg = { name: 'AES-GCM', iv: new Uint8Array(iv) };                            // specify algorithm to use
            const key = await crypto.subtle.importKey('raw', pwHash, alg, false, ['decrypt']);  // use pw to generate key
            const ctStr = atob(ciphertext.slice(24));                                           // decode base64 ciphertext
            const ctUint8 = new Uint8Array(ctStr.match(/[\s\S]/g).map(ch => ch.charCodeAt(0))); // ciphertext as Uint8Array
            let plaintext;
            plaintext = "";
            try {
                const plainBuffer = await crypto.subtle.decrypt(alg, key, ctUint8);
                password = new TextDecoder().decode(plainBuffer);                            // decode password from UTF-8
                connectServer();
            } catch(error) {
                alert("Decrypt Password Incorrect");
            }
        }
        //Execute resize with a timeout
        window.onresize = function() {
            clearTimeout(resizeInterval);
            resizeInterval = setTimeout(resize, 400);
        }
        // Recalculates the terminal Columns / Rows and sends new size to SSH server + xtermjs
        /*function resize() {
            if (term) {
                term.fit()
            }
        }*/
        $('.xterm-viewport').hide();
        $('.xterm-selection-layer').hide();
        $('.xterm-link-layer').hide();
        $('.xterm-cursor-layer').hide();
        $('.xterm-helper-textarea').css('height', '1px');
        $('.xterm-helper-textarea').css('border', 'none');
    }
}

</script>
<style>

</style>
