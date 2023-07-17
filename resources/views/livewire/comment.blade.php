<div>
    <div class="mb-5 flex justfiy-center items-center gap-4">
        <i class="fa-solid fa-comment-dots text-4xl text-white"></i>
        <p class="text-4xl leading-[46px] font-bold bg-gradient-to-r from-yellow-300 via-red-500 to-pink-500 bg-clip-text text-transparent">Share your thoughts ....</p>
    </div>
    <form wire:submit.prevent="addComment">
        <input class="w-[70vw] h-[60px] p-5 rounded border-2 border-gray-400"
        style="border-image: linear-gradient(to right, #ff00c6, #ff8a05) 1;"
        type="text"
        wire:model="newComment"
        name="comment"
        placeholder="Leave a comment...">


        <button type="submit" class="ml-2 relative p-0.5 inline-flex items-center justify-center font-bold overflow-hidden group rounded-md">
            <span class="w-full h-full bg-gradient-to-br from-[#ff8a05] via-[#ff5478] to-[#ff00c6] group-hover:from-[#ff00c6] group-hover:via-[#ff5478] group-hover:to-[#ff8a05] absolute"></span>
            <span class="relative px-7 py-3 transition-all ease-out bg-gray-900 rounded-md group-hover:bg-opacity-0 duration-400">
            <span class="relative text-white">
            Send 
                <i class="fa-solid fa-paper-plane text-white ml-2"></i>
            </span>
            </span>
        </button>
    </form>

    <div class="w-[70vw] rounded overflow-hidden shadow-lg bg-blue-200 mt-5">
        <div class="px-6 py-4">
            <ul>
                @foreach ($comments as $comment)
                    <div class="flex items-center justify-between gap-3">
                        <li class="flex-1 py-2 border-b border-gray-200">
                            @if ($comment->id === $editCommentId)
                                <form wire:submit.prevent="updateComment">
                                    <div class="flex items-center justify-between gap-3">
                                        <input class="w-full h-[40px] p-2 rounded border border-gray-400 focus:outline-blue-500 focus:outline-2" type="text" wire:model="editCommentBody" name="comment" placeholder="Edit your comment">
                                        <button type="submit">
                                            <i class="fa-solid fa-paper-plane text-blue-600 cursor-pointer"></i>
                                        </button>
                                        </div>
                                </form>
                            @else
                                <div class="flex items-center justify-between gap-1">
                                    <span class="text-lg font-medium">{{ $comment->body }}</span>
                                    <i wire:click="editComment({{ $comment->id }})" class="fa-solid fa-pen cursor-pointer text-blue-600"></i>
                                </div>
                            @endif
                        </li>
                        <i class="fa-solid fa-trash text-red-500 cursor-pointer" wire:click="deleteComment({{ $comment->id }})"></i>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
