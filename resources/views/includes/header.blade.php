<ul class="nav w-full">
    <li class="nav-item nav-item-home">
        <a id="root" href="/">
            <img id="logo" src="{{ url('avalia-vale-logo-sem-borda.png') }}">
            <h2 class="m-0 ml-3"><b>Avalia Vale</b></h2>
        </a>
    </li>
    <li class="nav-item nav-item-user">
        @if(auth()->user())
            <a class="nav-link disabled">{{ auth()->user()->name }}</a>
            @if(auth()->user()->admin)
                <sub>Menu</sub>
            @endif
        @else
            <a class="nav-link" href="/login">Login</a>
        @endif
    </li>
</ul>

<hr>

<style>

    #root {
        text-decoration: none;
        color: #212529;
        display: flex;
        align-items: center;
    }

    #logo {
        width: 77px;
    }

    .nav-item-home {
        width: 90%;
    }

    .nav-item-user {
        width: 10%;
        align-items: center;
        justify-content: center;
        display: flex;
    }

</style>
