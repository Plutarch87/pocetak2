<th><a href="{{ route('admin.events.show', [$event->id, $event->id]) }}">{{ $event->name }}</a></th>
<th>{{ $event->type }}</th>
<th>{{ count($event->users) }}</th>
<th>{{ $event->active ? 'active': 'pending' }}</th>
<th>{{ $event->updated_at }}</th>
<th>{{ $event->deleted_at ? $event->deleted_at : 'in progress' }}</th>