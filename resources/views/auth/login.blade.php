
<x-guest-layout>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="font-sans">
            <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                <div class="relative sm:max-w-sm w-full">
                    <div class="card bg-blue-900 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6">
                    </div>
                    <div class="card bg-red-700 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6">
                    </div>
                    <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                        <label for="" class="block text-sm text-gray-700 text-center font-semibold">
                            ENASA
                        </label>
                        <form method="#" action="#" class="mt-10">

                            <div>
                                <input type="email" id="email" name="email" :value="old('email')" required autofocus
                                    placeholder="  Email"
                                    class="mt-1 block w-full border border-blue-500 bg-gray-100 h-11 rounded-md shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            </div>

                            <div class="mt-7">
                                <input type="password" placeholder="  Contraseña"
                                    class="mt-1 block w-full border border-blue-500 bg-gray-100 h-11 rounded-md shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                    id="password" name="password" required autocomplete="current-password">
                            </div>

                            <div class="mt-7 flex">
                                <label for="remember_me" class="inline-flex items-center w-full cursor-pointer">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600">
                                        Recordarme
                                    </span>
                                </label>

                                <div class="w-full text-right">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                                        ¿Olvido su contraseña?
                                    </a>
                                </div>
                            </div>

                            <div class="mt-7">
                                <button
                                    class="bg-blue-800 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Iniciar Sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </form>
</x-guest-layout>
