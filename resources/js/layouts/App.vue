<template>
    <header class="bg-gray-100">
        <headermenu-component></headermenu-component>
    </header>
    <div id="body-color" class="flex w-full flex-grow flex-col flex-wrap py-4 sm:flex-row sm:flex-nowrap">
        <router-view></router-view>
    </div>
    <footer-component></footer-component>
</template>
<script>

import HeadermenuComponent from "../components/HeadermenuComponent";
import FooterComponent from "../components/FooterComponent";
export default {
    components: {
        FooterComponent, HeadermenuComponent}
}
</script>
