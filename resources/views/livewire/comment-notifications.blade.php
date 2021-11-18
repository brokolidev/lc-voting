<div x-data="{ isOpen: false }" class="relative">
    <button @click="
        isOpen = !isOpen
        if(isOpen) {
            Livewire.emit('getNotifications')
        }
    ">
    <svg class="h-8 w-8 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
        </svg>
        <div class="absolute rounded-full bg-red text-white text-xxs w-5 h-5 flex justify-center items-center border-2 -top-1 -right-1">8</div>
    </button>
    <ul x-show.transition.origin.top.left="isOpen" @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
        class="absolute w-76 md:w-96 bg-white shadow-dialog rounded-xl text-sm text-left z-10 max-h-128 overflow-y-auto text-gray-700 md:-right-8 -right-28">
        @foreach ($notifications as $notification)
            <li>
                <a href="{{ route('idea.show', $notification->data['idea_slug']) }}" 
                    class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in flex">
                    <img src="{{ $notification->data['user_avatar'] }}" alt="avatar" class="w-10 h-10 rounded-full">
                    <div class="ml-4">
                        <div class="line-clamp-6">
                            <span class="font-semibold">{{ $notification->data['user_name'] }}</span> commented on
                            <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>:
                            <span>"{{ $notification->data['comment_body'] }}"</span>
                        </div>
                        <div class="text-xs text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                </a>
            </li>
        @endforeach
        

        <li class="border-t border-gray-300 text-center">
            <button class="w-full hover:bg-gray-100 px-5 py-4 transition duration-150 ease-in block font-semibold">Mark all as read</button>
        </li>
    </ul>
</div>