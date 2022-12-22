@extends('layouts.app')

@section('title', 'Formulário de Veículos')

@section('content')
<div class="w-full mb-8 overflow-hidden rounded-lg">
    <div class="w-full overflow-x-auto">
        <form action="{{ route('veiculo.salvar') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $veiculo->id ?? '' }}">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Marca</span>
                    <input name="marca" value="{{ old('marca') ? old('marca') : $veiculo->marca ?? '' }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    @error('marca')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Modelo</span>
                    <input name="modelo" value="{{ old('modelo') ? old('modelo') : $veiculo->modelo ?? '' }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    @error('modelo')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Versão</span>
                    <input name="versao" value="{{ $veiculo->versao ?? '' }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    @error('versao')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Ano de Fabricação</span>
                    <input name="fabricacao" value="{{ $veiculo->fabricacao ?? '' }}" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    @error('fabricacao')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </label>
                <br>
                <br>
                <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Salvar
                </button>

                <a class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('veiculo.index') }}">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
