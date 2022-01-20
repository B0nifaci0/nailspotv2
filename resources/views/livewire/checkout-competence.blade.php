<div>
    @section('header')
        <div class="relative bg-purple-800 ">
            <div class="h-96 w-full">
                <img class="h-full w-full" src="https://wallpaperaccess.com/full/84248.png" alt="">
            </div>
        </div>
    @endsection
    <section class="bg-purple-800 pt-5">
        <div
            class="grid grid-cols-1 md:grid-cols-3 mx-auto flex-1 bg-indigo-800 text-white w-10/12 rounded-xl overflow-hidden">
            <div class="col-span-2">
                <div class="bg-pink-700 p-4 font-bold">
                    <h3 class="text-center text-xl">Opciones</h3>
                </div>
                <div class="p-5 grid grid-col-1 lg:grid-cols-3 flex items-center">
                    <div>
                        <p class="font-bold text-lg">Categorías:</p>
                        <select wire:model.defer="category" class="bg-purple-700 w-full lg:w-11/12 ">
                            <option selected>Selecciona una opción</option>
                            @foreach ($competence->categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <p class="font-bold text-lg">Niveles:</p>
                        <select wire:model.defer="level" class="bg-purple-700 w-full lg:w-11/12 ">
                            <option selected>Selecciona una opción</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-end flex-column">
                        <button
                            class="mt-7 bg-purple-800 px-3 py-2 rounded w-full lg:w-11/12 font-bold hover:bg-purple-700"
                            wire:click="searchSubcompetence">
                            Buscar
                        </button>
                    </div>
                </div>
                <div class="rounded p-5">
                    @if ($subcompetences)
                        <div class="bg-indigo-700 p-4 rounded-xl">
                            @forelse ($subcompetences as $subcompetence)
                                <p class="text-xl text-center font-bold">Detalles de la subcompetencia</p>
                                <hr>
                                <div class="mt-5 flex flex-row">
                                    <p class="font-bold mr-2">Nombre:</p>
                                    <p> {{ $subcompetence->name }}</p>
                                </div>
                                <div class=" flex flex-row">
                                    <p class="font-bold mr-2">Descripcion:</p>
                                    <p> {{ strip_tags($subcompetence->description) }}</p>
                                </div>
                                <div class=" flex flex-row">
                                    <p class="font-bold mr-2">Precio:</p>
                                    <p> ${{ $subcompetence->price }}</p>
                                </div>
                                <div class=" flex flex-row">
                                    <p class="font-bold mr-2">Nivel:</p>
                                    <p>{{ $levels->find($this->level)->name }} </p>
                                </div>
                                @if (!auth()->user()->subcompetenceDetails->contains('id', $subcompetence->id))
                                    <button wire:click="save({{ $subcompetence->id }}, {{ $subcompetence->price }})"
                                        class="mt-5 bg-purple-800 w-full rounded py-4 font-bold hover:bg-purple-700">
                                        Comprar
                                    </button>
                                @else
                                    <p class="my-2">Ya estas inscrito en esta subcompetencia</p>
                                @endif
                            @empty
                                <p class="text-center">No se encontraron resultados en tu busqueda</p>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
            <div>
                <div class="bg-pink-700 p-4 font-bold">
                    <h3 class="text-center text-xl">Detalles</h3>
                </div>
                <div class="p-5">
                    <div class="bg-indigo-700 p-5">
                        @if ($saleDetail)
                            @forelse ($saleDetail as $detail)
                                <div class="flex flex-row justify-between p-2">
                                    <div>
                                        <p>{{ $detail->subcompetence->name }}</p>
                                    </div>
                                    <div>
                                        <p>{{ $levels->where('id', $detail->level_id)->first()->name }}</p>
                                    </div>
                                    <div>
                                        <p>${{ $detail->subcompetence->price }}</p>
                                    </div>
                                </div>
                                <hr class="text-white">
                            @empty
                                <p class="text-center">Agrega una subcompetencia para continuar</p>
                            @endforelse
                        @endif
                        <div class="p-2 h-full">
                            @if (!$saleDetail->isEmpty())
                                <p class="mb-4 italic text-white">Si tienes el codigo de un cupón de descuento ingresalo
                                    aqui.</p>
                                <div class="flex items-center w-full pl-3 bg-gray-100 border rounded-full h-13">
                                    <input type="coupon" name="code" id="coupon" placeholder="Ingresa codígo del cupón"
                                        wire:model="search"
                                        class="w-full bg-gray-100 outline-none text-black appearance-none focus:outline-none active:outline-none" />
                                    <button wire:click="addCoupon()" type="submit"
                                        class="flex items-center px-3 py-1 text-sm text-white bg-pink-600 rounded-full outline-none md:px-4 hover:bg-pink-700 focus:outline-none active:outline-none">
                                        <svg aria-hidden="true" data-prefix="fas" data-icon="gift"
                                            class="w-8" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z" />
                                        </svg>
                                        <span class="font-medium ">Aplicar Cupón</span>
                                    </button>
                                </div>
                                @error('exist')
                                    <span class="mt-5 text-xl text-red-500 error">{{ $message }}</span>
                                @enderror
                                @error('cuponNotFound')
                                    <span class="text-xl text-red-500 error">{{ $message }}</span>
                                @enderror
                            @endif
                            <div class="flex flex-row justify-between font-bold ">
                                <div class="p-4 w-full">
                                    @if ($active)
                                        <div class="flex justify-between border-b">
                                            <div
                                                class="m-2 text-lg font-bold text-center text-white lg:px-4 lg:py-2 lg:text-xl">
                                                Subtotal
                                            </div>
                                            <div
                                                class="m-2 font-bold text-center text-white lg:px-4 lg:py-2 lg:text-lg">
                                                ${{ $subtotal }}
                                            </div>
                                        </div>
                                        <div class="flex justify-between pt-4 border-b">
                                            <div
                                                class="flex m-2 text-lg font-bold text-white lg:px-4 lg:py-2 lg:text-xl">
                                                <button wire:click="clearActive()"" type=" submit"
                                                    class="mt-1 mr-2 lg:mt-2">
                                                    <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt"
                                                        class="w-4 text-red-600 hover:text-red-800"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path fill="currentColor"
                                                            d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z" />
                                                    </svg>
                                                </button>
                                                "{{ $active->code }}"
                                            </div>
                                            @if ($active->type == 0)
                                                <div
                                                    class="m-2 font-bold text-center text-white lg:px-4 lg:py-2 lg:text-lg">
                                                    - $ {{ $active->discount }}
                                                </div>
                                            @else
                                                <div
                                                    class="m-2 font-bold text-center text-white lg:px-4 lg:py-2 lg:text-lg">
                                                    - {{ $active->discount }}%
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="flex justify-between pt-4 border-b">
                                        <div
                                            class="m-2 text-lg font-bold text-center text-white lg:px-4 lg:py-2 lg:text-xl">
                                            Total
                                        </div>
                                        <div class="m-2 font-bold text-center text-white lg:px-4 lg:py-2 lg:text-lg">
                                            ${{ $total }}
                                        </div>
                                    </div>

                                    @if ($total <= 0 && !$saleDetail->isEmpty())
                                        <form method="POST" action="{{ route('competence.enrolled', $competence) }}">
                                            @csrf
                                            @if ($active)
                                                <input type="hidden" name="coupon_id" value='{{ $active->id }}'>
                                            @endif
                                            <button type="submit"
                                                class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-pink-800 rounded-full shadow item-center hover:bg-pink-700 focus:shadow-outline focus:outline-none">
                                                <svg aria-hidden="true" data-prefix="far" data-icon="credit-card"
                                                    class="w-8" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                                </svg>
                                                <span class="ml-2 mt-5px">Inscribirse</span>
                                            </button>
                                    @endif
                                    @if ($total > 0)
                                        </form>
                                        <p class="text-lg font-semibold text-center text-white"> Seleccione Plataforma
                                            de
                                            pago</p>
                                        <div>
                                        </div>

                                        <form action="{{ route('payment.pay') }}" method="post" id="paymentForm">
                                            @csrf
                                            <input name='value' type="text" wire:model='total' class='hidden'>
                                            <input name='coupon' type="text" wire:model='couponId' class='hidden'>
                                            <input name='competence' type="text" wire:model='competenceId'
                                                class='hidden'>
                                            <input name='type' type="text" value="1" class='hidden'>
                                            <input type="text" name="payment_platform" value="1" class='hidden'>
                                            <div>
                                                <button
                                                    class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-500 hover:bg-pink-600 rounded-xl"
                                                    type="submit" id="payButton">Pagar con PayPal</button>
                                            </div>
                                        </form>

                                        @include('components.stripe-collapse-competence')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
