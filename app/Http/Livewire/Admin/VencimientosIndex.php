<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contrato;
use Livewire\Component;
use Livewire\WithPagination;

class VencimientosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

	public $search;
    public $sort = "fechafinalizacion";
    public $direction = "asc";

	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
        $from = date("Y-m-d");
        $to = date("Y-m-d",strtotime($from."+ 90 days"));
        $documentos = Contrato::whereBetween('fechafinalizacion', [$from, $to])
                                ->where('objeto','LIKE', '%' . $this->search . '%')
                                ->orderBy($this->sort, $this->direction)
                                ->paginate(10);
        return view('livewire.admin.vencimientos-index',compact('documentos'));
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
