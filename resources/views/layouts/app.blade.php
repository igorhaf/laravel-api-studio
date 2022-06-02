<html>
<head>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}" />
    @livewireStyles
</head>
<body>
<header class="bg-gray-100">
    <nav class="flex h-20 items-center justify-between bg-white p-6 shadow-sm">
        <ul>
            <li class="space-x-5 text-xl">
                <a href="#" class="hidden text-gray-700 hover:text-indigo-700 sm:inline-block"><img src="//cdn.jsdelivr.net/npm/heroicons@1.0.1/outline/home.svg" class="mx-4 inline w-7 sm:mx-2" /></a>
                <a href="#" class="hidden text-gray-700 hover:text-indigo-700 sm:inline-block"><img src="//cdn.jsdelivr.net/npm/heroicons@1.0.1/outline/cog.svg" class="mx-4 inline w-7 sm:mx-2" /></a>
                <a href="#" class="hidden text-gray-700 hover:text-indigo-700 sm:inline-block"><img src="//cdn.jsdelivr.net/npm/heroicons@1.0.1/outline/gift.svg" class="mx-4 inline w-7 sm:mx-2" /></a>
                <a href="#" class="hidden text-gray-700 hover:text-indigo-700 sm:inline-block"><img src="//cdn.jsdelivr.net/npm/heroicons@1.0.1/outline/chart-bar.svg" class="mx-4 inline w-7 sm:mx-2" /></a>
            </li>
            <div class="space-y-1 hover:cursor-pointer sm:hidden">
                <span class="block h-1 w-10 rounded-full bg-gray-600"></span>
                <span class="block h-1 w-10 rounded-full bg-gray-600"></span>
                <span class="block h-1 w-10 rounded-full bg-gray-600"></span>
            </div>
        </ul>
    </nav>
</header>
<div class="flex w-full flex-grow flex-col flex-wrap py-4 sm:flex-row sm:flex-nowrap">
    <div class="w-fixed  w-96  flex-shrink flex-grow-0 px-4">
        <div class="sticky top-0 h-full w-full rounded-xl bg-gray-100 p-4">

        </div>
    </div>
    <main role="main" class="w-full flex-grow px-3 pt-1">
        <div id="app">
        {{ $slot }}
        </div>
    </main>
    <div class="w-fixed w-96 flex-shrink flex-grow-0 px-2">
        <div class="flex px-2 sm:flex-col">
            <div class="mb-3 w-full rounded-xl border bg-gray-50">
                <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-12 lg:px-8">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <span class="block text-indigo-600">Made with Tailwind CSS!</span>
                    </h2>
                </div>
            </div>
            <div class="p-2"><!--spacer--></div>
            <div class="mb-3 w-full rounded-xl bg-gray-100">
                <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-12 lg:px-8">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <span class="block">Ready to dive in?</span>
                    </h2>
                </div>
            </div>
            <div class="p-2"><!--spacer--></div>
            <div class="mb-3 w-full rounded-xl border bg-gray-50">
                <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-12 lg:px-8">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <span class="block text-indigo-600">Play free at Codeply today.</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="mt-auto bg-black">
    <div class="mx-auto p-5 text-white">
        <h1 class="text-1xl">Footer</h1>
    </div>
</footer>
@livewireScripts
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
