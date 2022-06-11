<x-app-layout >
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
              </svg>
            <span class="ml-2">All ideas</span>
        </a>
    </div>

    <div class="flex mt-4 bg-white idea-container rounded-xl"> 
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $idea->user->avatar }}" class="w-14 h-14 rounded-xl" alt="avatar">
                </a>
            </div>
            <div class="flex flex-col justify-between w-full mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="mt-3 text-gray-600 line-clamp-3">
                    {{ $idea->description }}
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                        <div class="font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div>&bull;</div>
                        <div>10 hours ago</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div class="flex items-center space-x-2" x-data="{ isOpen: false }">
                        <div class="px-4 py-2 font-bold leading-none text-center uppercase bg-gray-200 rounded-full text-xxs w-28 h-7">Open</div>
                        <button 
                            x-on:click="isOpen = !isOpen"
                            class="px-4 py-2 text-gray-400 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 42" stroke="currentColor" stroke-width="3.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                            <ul 
                                x-cloak
                                x-show="isOpen"
                                x-transition.origin.top.left
                                x-on:click.away="isOpen = false" 
                                x-on:keydown.window.escape="isOpen = false"
                                class="absolute py-3 ml-8 font-semibold text-left text-gray-900 bg-white w-44 hover:shadow-dialog rounded-xl">
                                <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete Post</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mt-6 button-container">
        <div class="flex items-center ml-6 space-x-4">
            <div class="relative" x-data="{ isOpen: false }">
                <button 
                    x-on:click="isOpen = !isOpen"    
                    type="button" class="flex items-center justify-center w-32 px-6 text-sm font-semibold text-white transition duration-150 ease-in border h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover hover:border-blue-hover">
                    Reply
                </button>
                <div 
                    x-cloak
                    x-show="isOpen"
                    x-transition.origin.top.left
                    x-on:click.away="isOpen = false" 
                    x-on:keydown.window.escape="isOpen = false"
                    class="absolute z-10 mt-2 text-sm font-semibold text-left text-white bg-white shadow-dialog w-104 rounded-xl">
                    <form action="#" class="px-4 py-6 space-y-4">
                        <div class="text-black">
                            <textarea cols="30" rows="4" name="post_comment" id="post_comment" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none outline-none ronded-xl" placeholder="Go ahead, don't be shy. Share your thoughts..."></textarea>
                        </div>

                        <div class="flex items-center space-x-3">
                            <button type="button" class="flex items-center justify-center w-1/2 px-6 text-sm font-semibold text-white transition duration-150 ease-in border h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover hover:border-blue-hover">
                                Post Comment
                            </button>
                            <button type="button" class="flex items-center justify-center w-32 text-xs font-semibold text-gray-900 transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-400">
                                <svg class="w-5 h-5 text-gray-600 -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="relative" x-data="{ isOpen: false }">
                <button 
                    x-on:click="isOpen = !isOpen"
                    type="button" class="flex items-center justify-center px-6 transition duration-150 ease-in bg-gray-200 border border-gray-200 font-smemibold text-s w-36 h-11 rounded-xl hover:border-gray-400">
                    <span>Set Status</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.origin.top.left
                    x-on:click.away="isOpen = false" 
                    x-on:keydown.window.escape="isOpen = false"
                    class="absolute z-20 mt-2 text-sm font-semibold text-left text-white bg-white shadow-dialog w-76 rounded-xl">
                    <form action="#" class="px-4 py-6 space-y-4 text-black">
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="text-black border-none bg-slate-200" name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="border-none bg-slate-200 text-purple" name="radio-direct" value="2">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="border-none bg-slate-200 text-yellow" name="radio-direct" value="3">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="border-none bg-slate-200 text-green" name="radio-direct" value="4">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="border-none bg-slate-200 text-red" name="radio-direct" value="5">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <textarea name="updated_comment" id=""updated_comment" cols="30" rows="3" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Add an update comment (optional)"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" class="flex items-center justify-center w-full text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-400">
                                <svg class="w-5 h-5 text-gray-600 -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="submit" class="flex items-center justify-center w-full text-xs font-semibold text-white transition duration-150 ease-in border h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover hover:border-blue-hover">
                                Update
                            </button>
                        </div>
                        <div>
                            <label for="" class="inline-flex items-center font-normal">
                                <input type="checkbox" class="bg-gray-200 rounded" name="notify_voters" checked="">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            <div class="px-3 py-2 font-semibold text-center bg-white rounded-xl">
                <div class="text-xl leading-snug">12</div>
                <div class="text-xs leading-none text-gray-400">Votes</div>
            </div>
            <button type="button" class="w-32 px-6 text-xs font-semibold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-400">
                Vote
            </button>
        </div>
    </div>

    <div class="relative pt-6 my-8 mt-1 space-y-6 comments-container ml-22">
        <div class="relative flex mt-4 bg-white comment-container rounded-xl"> 
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" class="w-14 h-14 rounded-xl" alt="avatar">
                    </a>
                </div>
                <div class="flex flex-col justify-between w-full mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="mt-3 text-gray-600">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reicie
                    </div>
    
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-gray-900">Joe Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                        </div>
                        <div class="flex items-center space-x-2" x-data="{ isOpen: false }">
                            <button 
                                x-on:click="isOpen = !isOpen"
                                class="px-4 py-2 text-gray-400 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 42" stroke="currentColor" stroke-width="3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul 
                                x-cloak
                                x-show="isOpen"
                                x-transition.origin.top.left
                                x-on:click.away="isOpen = false" 
                                x-on:keydown.window.escape="isOpen = false"
                                class="absolute z-20 py-3 ml-8 font-semibold text-left text-gray-900 bg-white w-44 hover:shadow-dialog rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex mt-4 bg-white is-admin comment-container rounded-xl"> 
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" class="w-14 h-14 rounded-xl" alt="avatar">
                    </a>
                    <div class="mt-1 font-bold text-center uppercase text-blue text-xxs">Admin</div>
                </div>
                <div class="flex flex-col justify-between w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to automovidickchips.</a>
                    </h4>
                    <div class="mt-3 text-gray-600">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reicie
                    </div>
    
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-blue">Andrea</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                        </div>
                        <div class="flex items-center space-x-2" x-data="{ isOpen: false }">
                            <button 
                                x-on:click="isOpen = !isOpen"
                                class="px-4 py-2 text-gray-400 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 42" stroke="currentColor" stroke-width="3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul 
                                x-cloak
                                x-show="isOpen"
                                x-transition.origin.top.left
                                x-on:click.away="isOpen = false" 
                                x-on:keydown.window.escape="isOpen = false"
                                class="absolute z-20 py-3 ml-8 font-semibold text-left text-gray-900 bg-white w-44 hover:shadow-dialog rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex mt-4 bg-white comment-container rounded-xl"> 
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" class="w-14 h-14 rounded-xl" alt="avatar">
                    </a>
                </div>
                <div class="flex flex-col justify-between w-full mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="mt-3 text-gray-600">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reicie
                    </div>
    
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-gray-900">Joe Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                        </div>
                        <div class="flex items-center space-x-2" x-data="{ isOpen: false }">
                            <button 
                                x-on:click="isOpen = !isOpen"
                                class="px-4 py-2 text-gray-400 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 42" stroke="currentColor" stroke-width="3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul 
                                x-cloak
                                x-show="isOpen"
                                x-transition.origin.top.left
                                x-on:click.away="isOpen = false" 
                                x-on:keydown.window.escape="isOpen = false"
                                class="absolute z-20 py-3 ml-8 font-semibold text-left text-gray-900 bg-white w-44 hover:shadow-dialog rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout >