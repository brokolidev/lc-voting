<div x-init="
        Livewire.on('commentWasAdded', () =>{
            isOpen = false
        })

        Livewire.hook('message.processed', (message, component) => {
            {{-- Pagination --}}
            if(['gotoPage', 'previousPage', 'nextPage'].includes(message.updateQueue[0].method)){
            {{-- if(message.updateQueue[0].method === 'gotoPage' 
                || message.updateQueue[0].method === 'nextPage' 
                || message.updateQueue[0].method === 'previousPage'){ --}}
                const firstComment = document.querySelector('.comment-container:first-child')
                firstComment.scrollIntoView({ behavior: 'smooth' })
            }

            {{-- Adding Comment --}}
            if(['commentWasAdded', 'statusWasUpdated'].includes(message.updateQueue[0].payload.event)
                && message.component.fingerprint.name === 'idea-comments') {
                const lastComment = document.querySelector('.comment-container:last-child')
                lastComment.scrollIntoView({ behavior: 'smooth' })
                lastComment.classList.add('bg-green-50')
                setTimeout(() => {
                    lastComment.classList.remove('bg-green-50')
                }, 5000)
            }
        })

        @if (session('scrollToComment'))
            const commentToScrollTo = document.querySelector('#comment-{{ session('scrollToComment') }}')
            commentToScrollTo.scrollIntoView({ behavior: 'smooth' })
            commentToScrollTo.classList.add('bg-green-50')
            setTimeout(() => {
                commentToScrollTo.classList.remove('bg-green-50')
            }, 5000)
        @endif

    " 
    x-data="{ isOpen: false }" class="relative">
    <button 
        @click="
            isOpen = !isOpen
            if(isOpen) {
                $nextTick(() => $refs.comment.focus())
            }
        " 
        type="button"
        class="flex items-center justify-center h-11 w-32 text-sm bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white">
        Reply
    </button>
    <div x-cloak x-show.transition.origin.top.left="isOpen" @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
        class="absolute z-10 md:w-104 w-64 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">

        @auth
            <form wire:submit.prevent="addComment" action="#" class="space-y-4 px-4 py-6">
                <div>
                    <textarea x-ref="comment" wire:model="comment" name="post_comment" id="post_comment" cols="30" rows="4"
                        class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                        placeholder="Go ahead, Don't be shy!"></textarea>

                    @error('comment')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center md:space-x-3 flex-col md:flex-row">
                    <button type="submit"
                        class="flex items-center justify-center h-11 md:w-1/2 w-full text-sm bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white">
                        Post Comment
                    </button>

                    <button type="button"
                        class="flex items-center justify-center md:w-32 w-full mt-2 md:mt-0 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                        <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <span class="ml-1">Attach</span>
                    </button>
                </div>
            </form>
        @else
            <div class="py-6 px-4">
                <div class="font-normal">Please login or create an account to post a comment.</div>
                <div class="flex items-center space-x-3 mt-8">
                    <a wire:click.prevent="redirectToLogin"
                        href="{{ route('login') }}"
                        class="inline-block text-center justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white">
                        Login
                    </a>

                    <a wire:click.prevent="redirectToRegister"
                        href="{{ route('register') }}"
                        class="inline-block text-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                        Sign Up
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>