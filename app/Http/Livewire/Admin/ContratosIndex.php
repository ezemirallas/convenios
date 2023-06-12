<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contrato;
use Livewire\WithPagination;

class ContratosIndex extends Component
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
        $contratos = Contrato::where('user_id', auth()->user()->id)
                ->where('category_id',1)
				->where('objeto','LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
				//->latest('id')
				->paginate(10);

        return view('livewire.admin.contratos-index',compact('contratos'));
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
