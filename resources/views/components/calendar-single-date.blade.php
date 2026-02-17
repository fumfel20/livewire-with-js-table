<div>
    <style>
        #externalGrids{
            padding-right: 5px;
            padding-left: 5px;
            float: left;
        }
    </style>
    <div wire:loading.remove wire:ignore id="externalGrids" class="">
        <label for="">{{ $label }}</label><br>
        <input id="selector" style="width: 153px;"  type="text" wire:model="{{ $name }}" value="{{ $value }}" >
    </div>
    <div wire:loading wire:ignore id="externalGrids" class="">
        <label for="">{{ $label }}</label><br>
        <input disabled id="selector" style="width: 153px;"  type="text" wire:model="{{ $name }}" value="{{ $value }}" >
    </div>
    <div wire:loading wire:ignore class="py-4" style="color: #0fad41">
        <div  x-transition  class="spinner-border" role="status">
            <span class="sr-only"></span>
        </div>
    </div>

</div>
