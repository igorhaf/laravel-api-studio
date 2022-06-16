<template>
    <div id="body-color" class="flex w-full flex-grow flex-col flex-wrap py-4 sm:flex-row sm:flex-nowrap">
        <headermenu-component></headermenu-component>
        <div class="w-fixed  w-96  flex-shrink flex-grow-0 px-4">
            <div id="sidebar-left"  class="sticky top-0 h-full w-full rounded-xl bg-gray-100 p-4">
                <fileexplorer-component></fileexplorer-component>
            </div>
        </div>
        <main role="main" class="w-full  flex-grow px-3 pt-1">
                <monacoeditor-component></monacoeditor-component>
                <terminal-component></terminal-component>
        </main>
        <div class="w-fixed  w-96  flex-shrink flex-grow-0 px-4">
            <div id="sidebar-right"   class="sticky top-0 h-full w-full rounded-xl bg-gray-100 p-4">
                <componentsexplorer-component></componentsexplorer-component>
            </div>
        </div>
    </div>
</template>
<script>

import HeadermenuComponent from "../components/HeadermenuComponent";
import FileexplorerComponent from "../components/FileexplorerComponent";
import MonacoeditorComponent from "../components/MonacoeditorComponent";
import ComponentsexplorerComponent from "../components/ComponentsexplorerComponent";
import TerminalComponent from "../components/TerminalComponent";
export default {
    components: {MonacoeditorComponent, HeadermenuComponent, ComponentsexplorerComponent, FileexplorerComponent, TerminalComponent}
}
</script>
