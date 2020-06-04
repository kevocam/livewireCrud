<?php

namespace App\Http\Livewire;

use Livewire\Component;

class User extends Component
{
    public $data, $name, $apellido, $selected_id;
    public $updateMode = false;

    public function resetInput(){
        $this->name = null;
        $this->apellido = null;
    }
    public function render()
    {   
        $this->data= Contact::all();
        return view('livewire.contact');
    }
    public function store(){
        $this->validate([
            'name'=> 'required|min:5',
            'apellido'=>'required|min:5'
        ]);

        Contact::create([
            'name'=> $this->name,
            'apellido' => $this->apellido
        ]);
        $this->resetInput();        
    }
    public function edit($id){
        $record = Contacts::findorFail($id);

        $this->selected_id =$id;
        $this->name = $record->name;
        $this->apellido = $record->apellido;

        $this->updateMode = true;
    }

    public function update(){
        $this->validate([
            'selected_id'=> 'required|numeric',
            'name'=> 'required|min:5',
            'apellido'=>'required|min:5'
        ]);
        
        if ($this->selected_id){
            $record = Contacts::find($this->selected_id);
            $record->update([
                'name' =>$this->name,
                'apellido' => $this->apellido
            ]);
            $this->resetInput();        
            $this->updateMode = false;
        }
        
    }

}
