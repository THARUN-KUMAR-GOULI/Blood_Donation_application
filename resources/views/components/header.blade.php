<header class="header">
        <div class="logo">
            <span id="name">Tharun</span>
            <br>
            <span id="caption">Blood Organisation</span>
        </div>

        <div class="buttons">
            <form action="{{ route('login') }}" method="get">
                <button type="submit" class="btn">Login</button>
            </form>
            <form action="{{ route('signup') }}" method="get">
                <button type="submit" class="btn">Signup</button>
            </form>
        </div>
    </header>