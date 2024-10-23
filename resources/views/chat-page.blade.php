@extends('layouts.chat-app')

@section('content')

    <link rel="stylesheet" href={{asset("css/chat-page.css")}}>
    <div class="chat-container">
        <div id="chat-window">
            <div id="output"></div>
        </div>
        <div id="button-container">
            <!-- Buttons will be dynamically inserted here -->
        </div>
    </div>

    <script src={{asset("js/chat-page.js")}}></script>

@endsection
