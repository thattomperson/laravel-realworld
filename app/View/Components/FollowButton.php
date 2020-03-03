<?php

namespace App\View\Components;

use App\User;
use Illuminate\View\Component;

class FollowButton extends Component
{
    /**
     * The alert message.
     *
     * @var User
     */
    public $user;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
      <form method="POST" action="{{ route('profile.follow', [$user->id]) }}" class="list-inline-item">
        @csrf
        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-plus-round"></i>
          &nbsp;
          Follow {{ $user->name }} <span class="counter">({{ $user->followers_count }})</span>
        </button>
      </form>
    blade;
    }
}
