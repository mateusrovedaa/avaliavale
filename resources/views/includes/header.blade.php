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
            <div class="dropdown show">
                <a class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Perfil</a>
                    @if(auth()->user()->admin)
                        <a class="dropdown-item" href="/categories">Categorias</a>
                        <a class="dropdown-item" href="/companies">Empresas</a>
                        <a class="dropdown-item" href="/questions">Perguntas</a>
                    @endif
                </div>
            </div>
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
        width: 84%;
    }

    .nav-item-user {
        width: 16%;
        align-items: center;
        justify-content: end;
        display: flex;
    }

</style>
