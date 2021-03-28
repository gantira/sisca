<?php

namespace App\View\Components\admin\posts;

use Illuminate\View\Component;

class form extends Component
{
    public $backUrl;
    public $button;
    public $categories;
    public $tags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($backUrl, $button, $categories, $tags)
    {
        $this->backUrl = $backUrl;
        $this->button = $button;
        $this->categories = $categories;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.posts.form');
    }
}
