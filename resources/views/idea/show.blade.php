<x-app-layout>
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All ideas</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />

    <x-notification-success />

    <x-modals-container :idea="$idea" />

    <div class="comments-container relative space-y-6 md:ml-22 mt-1 pt-4 my-8">
        <div class="comment-container relative bg-white rounded-xl flex">
            <div class="flex flex-col md:flex-row px-4 py-6 flex-1">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 w-full">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi repellendus at blanditiis ducimus
                        earum fugit ratione, assumenda consectetur praesentium. Minima sapiente molestias vitae at quia
                        blanditiis quam dicta vero aspernatur?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">Jone Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
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

        {{-- for admin <div class="comment-container is-admin relative bg-white rounded-xl flex">
            <div class="flex px-4 py-6 flex-1">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to "Under Consideration"</a>
                    </h4>
                    <div class="text-gray-600 xt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi asd</div>
                    
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-blue">Andrea</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in text-gray-400 px-3 border">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 text-left ml-8 hidden">
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container --> --}}


    </div> <!-- end comments container -->
</x-app-layout>
