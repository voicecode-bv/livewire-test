<?php

namespace App\Http\Livewire\Tests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class TestComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $user;
    public $selectbox;
    public $search;

    protected $queryString = [
        'search',
        'selectbox',
    ];

    // Reset input fields.
    public function resetFields()
    {
        $this->name = null;
    }

    public $options = [
        1 => 'Option 1',
        2 => 'Option 2',
        3 => 'Option 3',
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function getData()
    {
        return $this->user->shortlists()
                ->where('name', 'LIKE', '%'.$this->search.'%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
    }

    public function render()
    {
        return view('livewire.test-component', [
            'shortlists' => $this->getData(),
            'user' => auth()->user(),
        ]);
    }
}
