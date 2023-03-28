@props([
    'action',
    'btnText'=>'Create',
    'method' => 'POST',
    'actionParams' => [], 
    'titleDefault' => '', 
    'bodyDefault' => '', 
    ])

<form method="post" action="{{ route($action, $actionParams) }}">
    @csrf

    @if ($method !== 'POST' && ( $method === 'PUT' || $method === 'PATCH'))
        @method($method)
    @endif

    <p class="form-control">
        <label for="title">Title</label>
        <input id="title" name="title" value="{{ old('title', $titleDefault) }}">
        @error('title')            
        <small>
            {{ $message }}
        </small>
        @enderror
    </p>

    <p class="form-control">
        <label for="body">Text</label>
        <textarea id="body" name="body" cols="45" rows="4">{{ old('body', $bodyDefault )}}</textarea>
        @error('body')            
        <small>
            {{ $message }}
        </small>
        @enderror
    </p>

    <button>
        {{ $btnText }}
    </button>
</form>