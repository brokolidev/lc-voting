<div class="@if ($comment->is_status_update) is-status-update {{ 'status-'.Str::kebab($comment->status->name) }} @endif comment-container relative bg-white rounded-xl flex transition duration-500 ease-in">
    <div class="flex flex-col md:flex-row px-4 py-6 flex-1">
        <div class="flex-none">
            <a href="#" class="flex-none">
                <img src="{{ $comment->user->getAvatar() }}" alt="avatar"
                    class="w-14 h-14 rounded-xl">
            </a>
            @if($comment->user->isAdmin())
                <div class="text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>
            @endif
        </div>
        <div class="md:mx-4 w-full">
            {{-- <h4 class="text-xl font-semibold">
                <a href="#" class="hover:underline">A random title can go here</a>
            </h4> --}}
            <div class="text-gray-600">
                @admin
                    @if ($comment->spam_reports > 0)
                        <div class="text-red mb-2">Spam Reports: {{ $comment->spam_reports }}</div>
                    @endif
                @endadmin
                @if ($comment->is_status_update)
                    <h4 class="text-xl font-semibold mb-3">
                        Status changed to "{{ $comment->status->name }}"
                    </h4>
                @endif
                <div>
                    {{ $comment->body }}
                </div>
            </div>

            @auth
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                    <div class="@if ($comment->is_status_update) text-blue font-bold @endif text-gray-900">{{ $comment->user->name }}</div>
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

                            @can('update', $comment)
                            <li><a href="#" @click.prevent="
                                    isOpen = false
                                    Livewire.emit('setEditComment', {{ $comment->id }})
                                    "
                                class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Edit Comment</a></li>
                            @endcan

                            @can('delete', $comment)
                            <li><a href="#" @click.prevent="
                                    isOpen = false
                                    Livewire.emit('setDeleteComment', {{ $comment->id }})
                                    "
                                class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Delete Comment</a></li>
                            @endcan

                            {{-- @can('delete', $comment) --}}
                            <li><a href="#" @click.prevent="
                                    isOpen = false
                                    Livewire.emit('setMarkAsSpamComment', {{ $comment->id }})
                                    "
                                class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Mark as Spam</a></li>
                            {{-- @endcan --}}
                            
                        </ul>
                    </div>

                </div>
            </div>
            @endauth

        </div>
    </div>
</div> <!-- end comment container -->