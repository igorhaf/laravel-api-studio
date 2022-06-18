<template>
    <div>
        <filetab></filetab>
        <div id="monaco-editor-container"></div>
    </div>


</template>

<script>
import * as monaco from 'monaco-editor';
import Filetab from "./Filetab";

export default {
    components: {Filetab},
    mounted() {
        monaco.editor.create(document.getElementById("monaco-editor-container"), {
            value: "function hello() {\n\talert('Hello world!');\n}",
            language: "python",
            automaticLayout: true,
            theme: 'vs-dark'
        });
    }
}

</script>
<style>
    #monaco-editor-container{
        height: 50%;
    }
</style>
