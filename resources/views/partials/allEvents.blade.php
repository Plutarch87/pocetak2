@if(count($events))
    @foreach($events as $event)
        <h3><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></h3>
    @endforeach
@endif