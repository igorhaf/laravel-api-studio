@extends('layouts.app')
@section('content')
    <div id="body-color" class="flex w-full flex-grow flex-col flex-wrap py-4 sm:flex-row sm:flex-nowrap">
        @include('partials.sidebar-file-explorer')
        <main role="main" class="w-full  flex-grow px-3 pt-1">

            @include('partials.code-editor')
            @include('partials.terminal')
        </main>
        @include('partials.sidebar-components-explorer')
    </div>
@endsection()

