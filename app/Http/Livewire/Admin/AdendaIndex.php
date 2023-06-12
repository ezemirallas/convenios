<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contrato;
use Livewire\Component;
use Livewire\WithPagination;

class AdendaIndex extends Component
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
        $adendas = Contrato::where('user_id', auth()->user()->id)
        ->where('category_id',2)
        ->where('objeto','LIKE', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        //->latest('id')
        ->paginate(10);

        return view('livewire.admin.adenda-index',compact('adendas'));
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
