<?php

namespace App\Http\Livewire\Admin;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class AreasIndex extends Component
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
        $areas = Area::where('name','LIKE', '%' . $this->search . '%')
        //->latest('id')
        ->orderBy($this->sort, $this->direction)
        ->paginate(10);
        return view('livewire.admin.areas-index',compact('areas'));
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
