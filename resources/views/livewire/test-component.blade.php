<div>
    <input type="text" wire:model="search">

    <ul>
        @foreach($shortlists as $shortlist)
        <li>{{ $shortlist->name }}</li>
        @endforeach
    </ul>
</div>
