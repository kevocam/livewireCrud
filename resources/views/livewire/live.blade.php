<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <h2>hi</h2>
    @foreach ($datos as $dato)
    
        {{$dato->nombre}} - {{$dato->apellido}} - <a wire:click="destroy({{$dato->id}})">Eliminar</a><br>
    @endforeach

    <div class="col-md-6">
        <label for="">nombre</label>
        <input wire:model="nombre" name="nombre" type="text">
    </div>
    <div class="col-md-6">
        <label for="">Apellido</label>
        <input wire:model="apellido" name="apellido" type="text">
    </div>
    <div class="col-md-12">
        <button class="btn btn-info" wire:click="store()">
            Añadir
        </button>
    </div>
</div>