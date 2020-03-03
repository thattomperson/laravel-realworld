<?php

namespace App\View\Components;

use App\Article;
use Illuminate\View\Component;

class LikeButton extends Component
{
  /**
   * The alert message.
   *
   * @var Article
   */
  public $article;

  /**
   * Create the component instance.
   *
   * @param  string  $type
   * @param  string  $message
   * @return void
   */
  public function __construct(Article $article)
  {
    $this->article = $article;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return <<<'blade'
    <form method="POST" action="{{ route('article.like', [$article->id]) }}" class="list-inline-item">
      @csrf
      <button class="btn btn-sm btn-outline-primary">
        <i class="ion-heart"></i>
        &nbsp;
        Favourite Article <span class="counter">({{ $article->likes_count }})</span>
      </button>
    </form>
    blade;
  }
}
