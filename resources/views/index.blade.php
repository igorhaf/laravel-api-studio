@extends('layouts.main')
@section('content')
    @include('partials.header')
    <div class="flex w-full flex-grow flex-col flex-wrap py-4 sm:flex-row sm:flex-nowrap">
        @include('partials.sidebar-file-explorer')
        <main role="main" class="w-full flex-grow px-3 pt-1">
            @include('partials.code-editor')
            @include('partials.terminal')
        </main>
        <div class="w-fixed w-96 flex-shrink flex-grow-0 px-2">
            <div class="flex px-2 w-96 sm:flex-col">
                <div class="mb-3 w-full rounded-xl border bg-gray-50">
                    @include('partials.sidebar-components-explorer')
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection()

