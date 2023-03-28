<x-layout title="News">

  <x-slot:styles>
    <style>
        article,
        main {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            align-items: flex-start;
        }

        article {
            gap: 0.5rem;
        }
    </style>
  </x-slot>

  @forelse ($all as $item)
      
    <h3>
        {{$item->title}}
    </h3>
    
    <p class="main">
        {{$item->body}}
    </p>
    
    <a href="{{ route('news.show', $item) }}">
        View article
    </a>
  @empty
      No News
  @endforelse
</x-layout>