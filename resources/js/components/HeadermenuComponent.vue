<template>
    <nav id="nav-bar" class="flex h-20 items-center justify-between bg-white p-6 shadow-sm">
        <ul>
            <li class="space-x-5 text-xl">
                <router-link to="/" class="text-white hover:text-indigo-700 sm:inline-block"><svg class="code-icon"></svg></router-link>
                <router-link to="/restful" class="text-white hover:text-indigo-700 sm:inline-block"><svg class="api-icon"></svg></router-link>
            </li>
        </ul>
    </nav>
</template>
