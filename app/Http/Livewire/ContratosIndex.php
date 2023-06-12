<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Contrato;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class ContratosIndex extends Component
{

    use WithPagination;

    //protected $paginationTheme = "bootstrap";

	public $search;
    public $categoria;
    public $area;

	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
        if($this->categoria){
            if($this->area){
                $contratos = Contrato::orwhere('category_id',$this->categoria)
                                    ->where('objeto','LIKE', '%' . $this->search . '%')
                                    ->orwhere('category_id','not in',$this->sinElemento($this->categoria,[1,2,3]))
                                    ->orwhere('areageneradora_id',$this->area)
                                    ->orwhere('arearesponsable_id',$this->area)
                                    ->orderby('fechafinalizacion', 'desc')
                                    ->paginate(8);
            } else {
                $contratos = Contrato::orwhere('category_id',$this->categoria)
                                    ->where('objeto','LIKE', '%' . $this->search . '%')
                                    ->orwhere('category_id','not in',$this->sinElemento($this->categoria,[1,2,3]))
                                    ->orderby('fechafinalizacion', 'desc')
                                    ->paginate(8);
            }
        } else {
            if($this->area){
                $contratos = Contrato::orwhere('category_id',$this->categoria)
                                    ->where('objeto','LIKE', '%' . $this->search . '%')
                                    ->orwhere('areageneradora_id',$this->area)
                                    ->orwhere('arearesponsable_id',$this->area)
                                    ->orderby('fechafinalizacion', 'desc')
                                    ->paginate(8);
            } else {
                $contratos = Contrato::orwhere('category_id',$this->categoria)
                                    ->where('objeto','LIKE', '%' . $this->search . '%')
                                    ->orwhere('observacion','LIKE', '%' . $this->search . '%')
                                    ->orderby('fechafinalizacion', 'desc')
                                    ->paginate(8);
            }
        }

        $areas = Area::all();
        $personas = Persona::all();
        return view('livewire.contrato-index',compact('contratos','areas','personas'));
    }

    public function sinElemento($value,$arreglo){
        return array_diff($arreglo, array($value));
    }
}
