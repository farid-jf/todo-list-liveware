<div class="flex justify-center">
    <div class="flex flex-col justfiy-center gap-5">
        <input type="text" wire:model="task" wire:keydown.enter="addTodo" class="rounded-lg" placeholder="Add Todos">

        @forelse($todos as $todo)
            <div class="flex justify-between items-center gap-10">
                <div>
                    @if ($todo->status == 'open')
                    <input type="checkbox"  name="" id="markAsDone-({{ $todo->id }})" wire:change="markAsDone({{ $todo->id }})">
                    @endif
                    <label for="markAsDone-({{ $todo->id }})" style="{{ ($todo->status == 'done')? 'text-decoration: line-through':''}}">
                        {{$todo -> task}}
                    </label>

                </div>

                <div>
                    @if ($todo->status == 'done')
                        <button wire:click="remove({{ $todo->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16px" height="16px">
                                <path d="M3 6h18v2H3V6zm2 3v13c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9H5zm6 11H9v-9h2v9zm4 0h-2v-9h2v9zM15 4V2H9v2H4v2h16V4h-5z"/>
                            </svg>
                        </button>
                    @endif

                </div>
            </div>
                
        @empty
            <p>no todos here</p>
        @endforelse
    </div>

</div>
