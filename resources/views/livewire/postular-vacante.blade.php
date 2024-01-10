<div class="flex flex-col items-center justify-center p-5 mt-10 bg-gray-100 ">
    <h3 class="my-4 text-2xl font-bold text-center ">Postularme a esta vacante</h3>
    @if (session()->has('mensaje'))
        <p class="p-2 my-5 text-sm font-bold text-green-600 uppercase bg-green-100 border-green-600 rounded-lg ">
            {{ session('mensaje') }}
        </p>

    @else
    <form wire:submit.prevent='postularme' class="mt-5 w-96">
     <div class="mb-4">
        <x-input-label for="cv" :value="__('Curriculum u hoja de vida (PDF)')" />
        <x-text-input id="cv" type="file" accept=".pdf" wire:model='cv' class="block w-full mt-1 " />
     </div>

     @error('cv')
         <livewire:mostrar-alerta :message="$message"/>
     @enderror

     <x-primary-button class="justify-center w-full">
                {{ __('Postularme') }}
        </x-primary-button>
    </form>

    @endif

</div>
