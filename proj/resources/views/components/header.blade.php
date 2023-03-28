<header>
    <a href="{{ route('welcome') }}">Welcome</a>
    <nav>
        <a href="/home">Static Home</a>
        <a href="{{ route('page.show', 'about') }}">About</a>
        <a href="{{  route('news.index')  }}">News App</a>
        <a href="{{ route('news.create') }}">Create Post</a>
    </nav>
</header>