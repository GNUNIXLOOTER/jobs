<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component {
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv'=> 'required|mimes:pdf'
    ];

    public function mount( Vacante $vacante ) {

        $this->vacante = $vacante;

    }

    public function postularme() {

        $datos = $this->validate();

        //almacenar el cv
        $cv = $this->cv->store( 'public/cv' );
        $datos[ 'cv' ] = str_replace( 'public/cv/', '', $cv );

        //crear el candidato a la vacante
        $this->vacante->candidatos()->create( [
            'user_id' => auth()->user()->id,
            'cv' => $datos[ 'cv' ]
        ] );

        //crear la notificacion y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,
        $this->vacante->titulo, auth()->user()->id));

        //crear un mensaje
        session()->flash( 'mensaje', 'Se envio correctamente tu información, muchas suerte' );

        //redireccionar al usuario
        return redirect()->back();

    }

    public function render() {
        return view( 'livewire.postular-vacante' );
    }
}
