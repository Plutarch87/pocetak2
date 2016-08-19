@if(count($users))
    @foreach($users as $user)
        <h3><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></h3>
    @endforeach
@endif