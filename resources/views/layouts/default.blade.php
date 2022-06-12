<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container mt-6">
    <header class="row">
        @include('includes.header')
    </header>
    <div id="main" class="row">
        @yield('content')
    </div>
</div>
</body>
</html>

<style>

    body {
        background-color: #EBF6FF;
    }

    #main {
        border: 1px solid #4AABFB;
        border-radius: 15px;
        padding: 50px;
        margin-top: 15px;
    }

</style>
