<x-layout title="{{ $news->title }}">

    <h1>Edit: {{ $news->title }}</h1>
    <x-news-form  action="news.update" 
                method="PUT"
                btnText="Update"
                :actionParams="$news" 
                :titleDefault="$news->title"
                :bodyDefault="$news->body"
                />
</x-layout>