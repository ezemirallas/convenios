<?php

namespace App\Http\Livewire\Admin;

use App\Models\Responsable;
use Livewire\Component;
use Livewire\WithPagination;

class ResponsableIndex extends Component
{
	use WithPagination;

	protected $paginationTheme = "bootstrap";

	public $search;
    public $sort = "id";
    public $direction = "asc";

	public function updatingSearch(){
		$this->resetPage();
	}

	public function render()
	{
		$responsables = Responsable::where('apellido','LIKE', '%' . $this->search . '%')
				//->latest('id')
                ->orderBy($this->sort, $this->direction)
				->paginate(10);
		return view('livewire.admin.responsable-index',compact('responsables'));
	}

    public function order($sort){

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
