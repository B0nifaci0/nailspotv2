<div class="grid grid-cols-2 gap-4">
    @if ($taskuser->score)
    <div>
        <label>Calificacion</label>
        <input type="text" readonly value="{{$taskuser->score}}" class="form-input">
    </div>
    @else
    <label>calificacion</label>
    <select wire:model="selectedScore" class="form-control">
        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
            @endfor
    </select>
    <button wire:click='qualify'>Calificar</button>
    @endif
</div>