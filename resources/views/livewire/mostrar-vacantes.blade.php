<div>
<div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

@forelse ( $vacantes as $vacante )

<div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
        <div class="space-y-3">
            <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold" >{{ $vacante->titulo }}</a>
            <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
            <p class="text-sm text-gray-600"><span class="font-bold">Ultimo Día: </span>{{ $vacante->ultimo_dia->format('d/m/Y') }}</p>

        </div>

        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                {{ $vacante->candidatos->count()  }} -> Candidatos
            </a>

            <a  href="{{ route('vacantes.edit',$vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Editar
            </a>

            <button class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
             wire:click="$dispatch('mostrarAlertEliminar', [{{ $vacante->id }}])">
                Eliminar
            </button>
        </div>

    </div>

@empty

<p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>

@endforelse

</div>

<div class=" mt-10">
    {{ $vacantes->links() }}
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('mostrarAlertEliminar', vacanteId =>{
        Swal.fire({
        title: "Eliminar Vacante?",
        text: "Una vacante eliminada no se puede recuperar",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, Eliminar!",
        cancelButtonText: 'Cancelar'
        }).then((result) => {
    if (result.isConfirmed) {
        //eliminar vacante
        Livewire.dispatch('eliminarVacante', vacanteId)
            Swal.fire({
            title: "Eliminado!",
            text: "La vacante fue eliminada",
            icon: "success"
            });
        }
        });
    })

</script>
@endpush
</div>
