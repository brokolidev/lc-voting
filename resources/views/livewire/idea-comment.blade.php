<div class="comment-container relative bg-white rounded-xl flex">
    <div class="flex flex-col md:flex-row px-4 py-6 flex-1">
        <div class="flex-none">
            <a href="#" class="flex-none">
                <img src="{{ $comment->user->getAvatar() }}" alt="avatar"
                    class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="md:mx-4 w-full">
            {{-- <h4 class="text-xl font-semibold">
                <a href="#" class="hover:underline">A random title can go here</a>
            </h4> --}}
            <div class="text-gray-600">
                {{ $comment->body }}
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                    <div class="font-bold text-gray-900">{{ $comment->user->name }}</div>
                    @if ($comment->user->id === $ideaUserId)
                        <div class="rounded-full border bg-gray-100 px-3 py-1">OP</div>
                    @endif
                    <div>&bull;</div>
                    <div>{{ $comment->created_at->diffForHumans() }}</div>
                </div>
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                    <div class="relative">
                        <button @click="isOpen = !isOpen"
                            class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in text-gray-400 px-3 border">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                        <ul x-cloak x-show.transition.origin.top.left="isOpen" @click.away="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            class="absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 text-left z-10 md:ml-8 top-8 md:top-6 right-0 md:left-0">
                            <li><a href="#"
                                    class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Mark
                                    as Spam</a></li>
                            <li><a href="#"
                                    class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Delete
                                    Post</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> <!-- end comment container -->