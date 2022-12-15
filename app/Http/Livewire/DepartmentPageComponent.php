<?php

namespace App\Http\Livewire;

use App\Models\Rv\Department;
use App\Models\Rv\DepartmentPage;
use Livewire\Component;

class DepartmentPageComponent extends Component
{
    public $action;
    public $department;
    public $departmentpage;

    public $message;

    protected $rules = [
        'message' => 'required',
    ];

    public function mount(Department $department, DepartmentPage $departmentpage, $action='show')
    {
        $this->department = $department;
        $this->departmentpage = $departmentpage;
        $this->action = $action;
    }

    public function submit() {

        // $xx = $this->form->getState();

        $validatedData = $this->validate();
    }

    public function render()
    {
        return view('livewire.department-page')
            ->layout(\App\View\Components\TestLayout::class);
    }
}
