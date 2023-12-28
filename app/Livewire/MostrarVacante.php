<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;

class MostrarVacante extends Component
{
    public $vacante;

    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}
