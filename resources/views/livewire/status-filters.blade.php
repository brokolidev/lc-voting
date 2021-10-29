<nav class="md:flex items-center justify-between text-xs hidden text-gray-400">
    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
        <li><a wire:click.prevent="setStatus('All')" href="{{ route('idea.index', ['status' => 'All']) }}" class="border-b-4 pb-3 @if($status === 'All') border-blue text-gray-900 @endif">All Idias ({{ $statusCount['all_status'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="{{ route('idea.index', ['status' => 'Considering']) }}" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status === 'Considering') border-blue text-gray-900 @endif">Considering ({{ $statusCount['considering'] }})</a></li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="{{ route('idea.index', ['status' => 'In Progress']) }}" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status === 'In Progress') border-blue text-gray-900 @endif">In Progress ({{ $statusCount['in_progress'] }})</a></li>
    </ul>

    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
        <li><a wire:click.prevent="setStatus('Implemented')" href="{{ route('idea.index', ['status' => 'Implemented']) }}" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status === 'Implemented') border-blue text-gray-900 @endif">Implemented ({{ $statusCount['implemented'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="{{ route('idea.index', ['status' => 'Closed']) }}" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status === 'Closed') border-blue text-gray-900 @endif">Closed ({{ $statusCount['closed'] }})</a></li>
    </ul>
</nav>

