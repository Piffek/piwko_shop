<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\ToDoList;

class ToDoListComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $userItemCount;

    /**
     * Create a new profile composer.
     *
     * @param  Baskets  $userItemCount
     * @return void
     */
    public function __construct(ToDoList $taskCurrentUser)
    {
        // Dependencies automatically resolved by service container...
        $this->taskCurrentUser = $taskCurrentUser;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
		$todolist = new ToDoList;
        $view
		->with('taskCurrentUser', $this->taskCurrentUser->taskCurrentUser());
    }
}