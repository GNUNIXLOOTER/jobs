<form class="space-y-5 md:w-1/2" wire:submit.prevent='crearVacante'>

     <div>
         <x-input-label for="titulo" :value="__('Titulo Vacante')" />
         <x-text-input id="titulo" class="block w-full mt-1" type="text" wire:model="titulo" :value="old('titulo')" />

         @error('titulo')
             <livewire:mostrar-alerta :message="$message"/>
         @enderror
     </div>

     <div>
         <x-input-label for="salario" :value="__('Salario Mensual')" />
         <select class="block w-full mb-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-300" wire:model="salario" id="salario">
                <option>Selecciona un Salario</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                @endforeach

        </select>
         @error('salario')
         <livewire:mostrar-alerta :message="$message"/>
         @enderror
     </div>

     <div>
         <x-input-label for="categoria" :value="__('Categoría')" />
         <select class="block w-full mb-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-300" wire:model="categoria" id="categoria">
                <option value="">Selecciona un Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
        </select>
         @error('categoria')
         <livewire:mostrar-alerta :message="$message"/>
         @enderror
     </div>

     <div>
         <x-input-label for="empresa" :value="__('Empresa')" />
         <x-text-input id="empresa" class="block w-full mt-1" type="text" wire:model="empresa" :value="old('empresa')" />
         @error('empresa')
         <livewire:mostrar-alerta :message="$message"/>
         @enderror
     </div>

     <div>
         <x-input-label for="ultimo_dia" :value="__('Ultimo día para postularse')" />
         <x-text-input id="ultimo_dia" class="block w-full mt-1" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" />
         @error('ultimo_dia')
         <livewire:mostrar-alerta :message="$message"/>
         @enderror
     </div>

     <div>
         <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
         <textarea id="descripcion" class="block w-full mt-1 h-72" wire:model="descripcion" :value="old('descripcion')"></textarea>
         @error('descripcion')
         <livewire:mostrar-alerta :message="$message"/>
         @enderror
     </div>

     <div>
         <x-input-label for="imagen" :value="__('Imagen')" />
         <x-text-input id="imagen" class="block w-full mt-1" type="file" accept="image/*" wire:model="imagen"/>

         <div class="my-5 w-52">
            @if ($imagen)
            Imagen:
            <img src="{{ $imagen->temporaryUrl() }}" alt="">

            @endif
         </div>
         @error('imagen')
         <livewire:mostrar-alerta :message="$message"/>
         @enderror
     </div>

     <x-primary-button class="justify-center w-full">
                {{ __('Crear Vacante') }}
    </x-primary-button>

</form>
