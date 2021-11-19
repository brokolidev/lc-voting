<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Notifications\DatabaseNotification;

class CommentNotifications extends Component
{

    const NOTIFICATION_TRESHOLD = 10;

    public $notifications;
    public $notificationCount;
    public $isLoading;


    protected $listeners = ['getNotifications'];

    public function mount()
    {
        $this->notifications = collect([]);
        $this->isLoading = true;
        $this->getNofificationCount();
    }

    public function getNofificationCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if($this->notificationCount > self::NOTIFICATION_TRESHOLD) {
            $this->notificationCount = self::NOTIFICATION_TRESHOLD.'+';
        }
    }

    public function getNotifications()
    {
        $this->notifications = auth()->user()
            ->unreadNotifications()
            ->latest()
            ->take(self::NOTIFICATION_TRESHOLD)
            ->get();

        $this->isLoading = false;
    }

    public function markAllAsRead()
    {
        if(auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        auth()->user()->unreadNotifications->markAsRead();
        $this->getNotifications();
        $this->getNofificationCount();
    }

    public function markAsRead($notificationId)
    {
        if(auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $notification = DatabaseNotification::findOrFail($notificationId);
        $notification->markAsRead();

        $this->scrollToComment($notification);
    }

    public function scrollToComment($notification)
    {
        $idea = Idea::find($notification->data['idea_id']);
        if(!$idea) {
            session()->flash('error_message', '존재하지 않는 아이디어입니다.');

            return redirect()->route('idea.index');
        }

        $comment = Comment::find($notification->data['comment_id']);
        if(!$comment) {
            session()->flash('error_message', '존재하지 않는 댓글입니다.');

            return redirect()->route('idea.index');
        }

        $comments = $idea->comments()->pluck('id');
        $indexOfComment = $comments->search($comment->id);

        $page = (int) ($indexOfComment / $comment->getPerPage()) + 1;

        session()->flash('scrollToComment', $comment->id);
        
        return redirect()->route('idea.show', [
            'idea' => $notification->data['idea_slug'],
            'page' => $page,
        ]);
    }

    public function render()
    {
        return view('livewire.comment-notifications', [
            'notifications' => $this->notifications,
        ]);
    }
}
