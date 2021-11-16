
<div>
    @if ($comments->isNotEmpty())
        <div class="comments-container relative space-y-6 md:ml-22 mt-1 pt-4 my-8">

            @foreach ($comments as $comment)
                <livewire:idea-comment :key="$comment->id" :comment="$comment" :ideaUserId="$idea->user->id" /> 
            @endforeach
        
        
        </div> <!-- end comments container -->

        <div class="my-8 md:ml-22">
            {{ $comments->onEachSide(1)->links() }}
        </div>
    @else
        <div class="mx-auto w-70 my-12">
            <img src="{{ asset('img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
            <div class="text-gray-400 text-center font-bold mt-6">No ideas were found ...</div>
        </div>
    @endif
</div>
