<template>
    <div class="w-fixed  w-96  flex-shrink flex-grow-0 px-4">
        <fileexplorer-component></fileexplorer-component>
    </div>
    <main role="main" class="w-full  flex-grow px-3 pt-1">
        <monacoeditor-component></monacoeditor-component>
        <terminal-component></terminal-component>
    </main>
    <div class="w-fixed  w-96  flex-shrink flex-grow-0 px-4">
        <componentsexplorer-component></componentsexplorer-component>
    </div>
</template>
<script>

import FileexplorerComponent from "../components/FileexplorerComponent";
import MonacoeditorComponent from "../components/MonacoeditorComponent";
import ComponentsexplorerComponent from "../components/ComponentsexplorerComponent";
import TerminalComponent from "../components/TerminalComponent";
export default {
    components: {
        MonacoeditorComponent, ComponentsexplorerComponent, FileexplorerComponent, TerminalComponent}
}
</script>
