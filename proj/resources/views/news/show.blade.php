<x-layout title="{{ $news->title }}">

    <h1>{{$news->title}}</h1>
    <p>
        {{$news->body}}
    </p>

    <section style="margin-top:2rem;display: flex; gap: 10rem;">
        <a href="{{route('news.edit', $news)}}">Edit</a>
        <form action="{{route('news.destroy', $news) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </section>

</x-layout>