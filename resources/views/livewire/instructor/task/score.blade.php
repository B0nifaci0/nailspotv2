<div class="grid grid-cols-2 gap-4">
    @if ($taskuser->score)
    <div>
        <label class="font-bold text-grey-900">Calificación:</label>
        <input type="text" readonly value="{{$taskuser->score}}" class="form-input">
    </div>
    @else
    <label class="font-bold text-grey-900">Asignar calificación:</label><br>
    <select wire:model="selectedScore" class="form-control">
        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
            @endfor
    </select>
    <button wire:click='qualify' class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Calificar</button>
    @endif
</div>