<template>
    <div id="monaco-editor-container"></div>
</template>

<script>
import * as monaco from 'monaco-editor';

export default {
    mounted() {
        monaco.editor.create(document.getElementById("monaco-editor-container"), {
            value: "function hello() {\n\talert('Hello world!');\n}",
            language: "python",
            automaticLayout: true
        });
    }
}

</script>
<style>
    #monaco-editor-container{
        height: 500px;
    }
</style>
