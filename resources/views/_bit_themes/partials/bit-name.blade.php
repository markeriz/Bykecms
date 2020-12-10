@if (!empty($bit->name))
    <h2>
        <a href="{{ url('/'.$bit->slug) }}" class="black">
            {{ $bit->name }}
        </a>
    </h2>
@endif