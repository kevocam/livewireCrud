<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class Live extends Component
{
    public $datos, $nombre, $apellido;
    
    public function clear(){
        $this->nombre = null;
        $this->apellido = null;
    }

    public function render()
    {
        $this->datos = Contact::all();

        return view('livewire.live');
    }
    public function store(){
        Contact::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido
        ]);
        $this->clear();
    }
    public function destroy($id){
        if($id){
            $record = Contact::where ('id',$id);
            $record->delete();
        }
    }

}
