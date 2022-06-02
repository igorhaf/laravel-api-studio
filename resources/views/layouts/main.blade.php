<html>
<head>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jQueryFileTree.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendors/zTreeStyle/zTreeStyle.css')}}" />
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/jQueryFileTree.min.js')}}"></script>
    <script src="{{asset('js/ztree/js/jquery.ztree.all.js')}}"></script>
    <script type="text/javascript" src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>
    <script>
        require.config({ paths: { 'vs': 'https://unpkg.com/monaco-editor@latest/min/vs' }});

        window.MonacoEnvironment = {
            getWorkerUrl: function(workerId, label) {
                return `data:text/javascript;charset=utf-8,${encodeURIComponent(`
                self.MonacoEnvironment = {
                  baseUrl: 'https://unpkg.com/monaco-editor@latest/min/'
                };
                importScripts('https://unpkg.com/monaco-editor@latest/min/vs/base/worker/workerMain.js');`
                )}`;
            }
        };

        require(["vs/editor/editor.main"], function () {
            monaco.editor.create(document.querySelector('.monaco-editor-container'), {
                value: `function x() {
  console.log("Hello world!");
}`,
                language: 'javascript',
                automaticLayout:true,
                theme: 'vs-dark',
            });
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@yield('content')
<script>
    var resizeInterval;
    var wSocket;
    var password;
    var idconnection = "<?= bin2hex(openssl_random_pseudo_bytes(12)) ?>";
    var intervalId;
    wSocket = new WebSocket("ws:localhost:8090");
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
    term.fit();
    term.focus();
    wSocket.onopen = function (event) {
        console.log("Socket Open");
        term.attach(wSocket,false,false);
        wSocket.send(JSON.stringify(dataSend));
        intervalId = window.setInterval(function(){
            wSocket.send(JSON.stringify({"refresh":""}));
        }, 700);
    };
    wSocket.onerror = function (event){
        alert("Connection Closed");
        term.detach(wSocket);
        window.clearInterval(intervalId);
    };
    term.on('data', function (data) {
        var dataSend = {"data":{"data":data}};
        wSocket.send(JSON.stringify(dataSend));
        //Xtermjs with attach dont print zero, so i force. Need to fix it :(
        if (data=="0"){
            term.write(data);
        }
    });
    async function decrypt() {
        passwordDecrypt = document.getElementById("decryptpassword").value;
        const pwUtf8 = new TextEncoder().encode(passwordDecrypt);                                  // encode password as UTF-8
        const pwHash = await crypto.subtle.digest('SHA-256', pwUtf8);                       // hash the password
        ciphertext = "{{$password}}";
        const iv = ciphertext.slice(0,24).match(/.{2}/g).map(byte => parseInt(byte, 16));   // get iv from ciphertext
        const alg = { name: 'AES-GCM', iv: new Uint8Array(iv) };                            // specify algorithm to use
        const key = await crypto.subtle.importKey('raw', pwHash, alg, false, ['decrypt']);  // use pw to generate key
        const ctStr = atob(ciphertext.slice(24));                                           // decode base64 ciphertext
        const ctUint8 = new Uint8Array(ctStr.match(/[\s\S]/g).map(ch => ch.charCodeAt(0))); // ciphertext as Uint8Array
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
    function resize() {
        if (term) {
            term.fit()
        }
    }
    $('.xterm-viewport').hide();
    $('.xterm-selection-layer').hide();
    $('.xterm-link-layer').hide();
    $('.xterm-cursor-layer').hide();
    $('.xterm-helper-textarea').css('height', '1px');
    $('.xterm-helper-textarea').css('border', 'none');



    $(document).ready(function(){
        $.fn.zTree.init($("#treeDemo"), setting, zNodes);
    });

    $(function () {
        $('.fileTree').fileTree({
            root: '../',
            script: '{{ url('/filetree?_token=' . csrf_token())}}'
        }, function (file) {
            console.log(file);
        });
    });

    var setting = {
        data: {
            simpleData: {
                enable: true
            }
        }
    };

    var zNodes =[
        { id:1, pId:0, name:"Modules", open:true, icon:"./css/vendors/zTreeStyle/img/diy/1_open.png"},
        { id:2, pId:0, name:"Class", open:true, iconOpen:"./css/vendors/zTreeStyle/img/diy/1_open.png", iconClose:"./css/vendors/zTreeStyle/img/diy/1_close.png"},
        { id:11, pId:2, name:"leaf node 01", icon:"./css/vendors/zTreeStyle/img/diy/2.png"},
        { id:12, pId:2, name:"leaf node 02", icon:"./css/vendors/zTreeStyle/img/diy/3.png"},
        { id:13, pId:2, name:"leaf node 03", icon:"./css/vendors/zTreeStyle/img/diy/5.png"},
        { id:3, pId:0, name:"Custom Icon 02", open:true, icon:"./css/vendors/zTreeStyle/img/diy/4.png"},
        { id:21, pId:3, name:"leaf node 01", icon:"./css/vendors/zTreeStyle/img/diy/6.png"},
        { id:22, pId:3, name:"leaf node 02", icon:"./css/vendors/zTreeStyle/img/diy/7.png"},
        { id:23, pId:3, name:"leaf node 03", icon:"./css/vendors/zTreeStyle/img/diy/8.png"},
        { id:4, pId:0, name:"no Custom Icon", open:true },
        { id:31, pId:4, name:"leaf node 01"},
        { id:32, pId:4, name:"leaf node 02"},
        { id:33, pId:4, name:"leaf node 03"}

    ];
</script>
</body>
</html>
