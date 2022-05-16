<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Avalia Vale</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="flex items-center" style="flex-flow: wrap;">
            <div class="flex justify-center items-center" style="flex-basis: 25%;">
                <img style="margin-right: 14px" id="logo" src="{{ url('avalia-vale-logo-sem-borda.png') }}">
                <h1 style="font-size: 30px"><b>Avalia Vale</b></h1>
            </div>
            <div style="flex-basis: 50%;">
                <input id="search-bar" class="w-full">
            </div>
            <div class="w-full" style="margin-top: 25px">
                <hr style="border: 2px solid #4AABFBD4;">
            </div>
        </div>
        <div id="menu-bar" class="flex" style="margin-top: 25px;">
            <div class="flex flex-col" style="border: 1px solid #4AABFB; width: 8%; margin-right: 2%">
                <i class="menu-item fa-solid fa-house"></i>
                <i class="menu-item fa-solid fa-heart"></i>
                <i class="menu-item fa-solid fa-chart-column"></i>
                <i class="menu-item fa-solid fa-user"></i>
                <i class="menu-item fa-solid fa-gear"></i>
            </div>
            <div id="content" class="flex items-center" style="border: 1px solid #4AABFB; width: 90%; align-items: start">
                <div class="flex flex-col" style="width: 75%; margin-left: 2%; margin-right: 2%;">
                    <div class="topic">
                        <div style="font-size: 18px; color: rgba(0, 0, 0, 0.5); margin-top: 27px; margin-left: 16px">Compartilhe sua avaliação com a gente...</div>
                        <button style="border: 1px solid #4AABFB; background-color: #0D85E8; color: white; border-radius: 10px; width: 97px; margin-left: 85%; margin-top: 25px;" onclick="window.location.href='/evaluations/1'">Avaliar</button>
                    </div>
                    <div class="topic">
                        <div class="flex sm:justify-between" style="font-size: 18px; margin-top: 27px; margin-left: 16px">
                            <span>Fui no Imec e as frutas estavam passadas...</span>
                            <img style="width: 96px; margin-right: 30px" src="{{ url('imec.png') }}">
                        </div>
                        <div class="flex items-center" style="margin-top: -5px; margin-left: 16px;">
                            <i style="color: #ECD820" class="fa-solid fa-star"></i>
                            <i style="color: #747474" class="fa-solid fa-star"></i>
                            <i style="color: #747474" class="fa-solid fa-star"></i>
                            <i style="color: #747474" class="fa-solid fa-star"></i>
                            <i style="color: #747474" class="fa-solid fa-star"></i>
                            <button style="margin-left: 25px; background-color: #D6BC61; border-radius: 10px; padding: 5px; color: rgba(0, 0, 0, 0.47)"><b>Alimento</b></button>
                        </div>
                    </div>
                    <div class="topic-item"></div>
                    <div class="topic"></div>
                </div>
                <div class="flex flex-col items-center companies" style="width: 19%; margin-right: 2%">
                    <h2>Melhores empresas</h2>
                    <img style="width: 50px; height: 50px; border-radius: 50%; margin-top: 10px" src="{{ url('docile.png') }}">
                    <img style="width: 50px; height: 50px; border-radius: 50%; margin-top: 10px" src="{{ url('fruki.png') }}">
                    <img style="width: 50px; height: 50px; border-radius: 50%; margin-top: 10px" src="{{ url('brf.png') }}">
                </div>
            </div>
        </div>
    </body>
</html>

<style>

    body {
        background-color: #EBF6FF;
        margin: 52px;
    }

    html, body, #menu-bar, #content {
        height: 100%;
    }

    #logo {
        width: 77px;
    }

    #search-bar {
        border: 1px solid #4AABFB !important;
        border-radius: 10px;
        height: 41px;
    }

    .menu-item {
        color: #4AABFB !important;
        font-size: 27px;
        margin: 13px;
        text-align: center;
    }

    .topic, .topic-item {
        height: 128px;
        background-color: #FEFFFF;
        border: 1px solid #4AABFB;
        width: 100%;
        border-radius: 10px;
        margin-top: 2%;
    }

    .topic-item {
        color: rgba(0, 0, 0, 0.72) !important;
    }

    .companies {
        height: 268px;
        background-color: #FEFFFF;
        border: 1px solid #4AABFB;
        width: 100%;
        border-radius: 10px;
        margin-top: 2%;
    }

</style>
