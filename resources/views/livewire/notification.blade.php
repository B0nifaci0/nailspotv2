<div>
    <div class="relative mr-8 md:mr-0 md:ml-3" x-data="{ notify: false}">
    <button x-on:click="notify= true" type="button" id="btn-notifications" class="flex text-lg transition duration-150 ease-in-out rounded-full focus:outline-none focus:border-gray-300">
        <i class="fas fa-bell text-white cursor-pointer"></i>
        @if(!$notifications->isEmpty()) 
            <b class="text-sm md:text-md bg-indigo-800 rounded-full w-5 text-white">{{count($notifications)}}</b>
        @endif
    </button>
    <div x-show="notify" x-on:click.away="notify = false" id="show-notification" class="absolute right-0 z-30 w-72 md:w-80 mt-2 origin-top-right bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none max-h-52 {{(count($notifications)>4) ?  'overflow-y-scroll' :  ''}}" role="notifications" aria-orientation="vertical" aria-labelledby="user-notification">
        @if(!$notifications->isEmpty()) 
        <div class="cursor-pointer bg-indigo-800 text-white font-bold flex justify-between">
            <p class="p-2 inline-block">Notificaciones</p>
            <i class="fa fa-trash inline-block p-2" aria-hidden="true" wire:click="deleteAll('{{auth()->user()->id}}')"></i>
        </div>
        @endif
        @forelse ($notifications as $notification)
        <div class="border bg-gray-50 hover:bg-gray-100 p-1">
            <a href="{{json_decode($notification->data)->action_url}}" wire:click="destroy('{{$notification->id}}')" class="flex flex-1  items-center">
                <img src="{{json_decode($notification->data)->icon}}" alt="" class="inline-block rounded-full w-10">
                <p class="font-extrabold inline-block text-xs md:text-md p-2">{{json_decode($notification->data)->body}}</p>
                @if(date('Y-m-d')==date('Y-m-d', strtotime($notification->created_at)))
                    <sup>{{date('H:i',strtotime($notification->created_at))}}</sup>
                @else
                    <sup class="w-36 md:w-20 px-0">{{date('d-M',strtotime($notification->created_at))}}</sup>
                @endif
            </a>
        </div>
        @empty
            <p class="p-2 bg-gray-100 text-center rounded-md">!No hay notificaciones para ti!</p>
        @endforelse
    </div>
    </div>
</div>
