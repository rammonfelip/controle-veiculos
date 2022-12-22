@extends('layouts.app')

@section('title', 'Formulário de Manutenção')

@section('content')
<div class="w-full mb-8 overflow-hidden rounded-lg">
    <div class="w-full overflow-x-auto">
        <form action="{{ route('manutencao.salvar') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $manutencao->id ?? '' }}">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Veículo</span>
                    <select name="veiculo_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="">Selecione</option>
                        @foreach($veiculos as $veiculo)
                            <option value="{{ $veiculo->id }}"
                                @if (isset($manutencao) && $manutencao->veiculo_id === $veiculo->id)
                                    selected
                                @endif
                            >{{ $veiculo->marca }} - {{ $veiculo->modelo }} - {{ $veiculo->fabricacao }}</option>
                        @endforeach
                    </select>
                    @error('veiculo_id')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Agendamento</span>
                    <input placeholder="__/__/____" name="agendamento" value="{{ isset($manutencao) && $manutencao->agendamento ? \Carbon\Carbon::parse($manutencao->agendamento)->format('d/m/Y') : '' }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input date"/>
                    @error('agendamento')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Descrição da Manutenção</span>
                    <textarea name="descricao"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3"
                    >{{ $manutencao->descricao ?? '' }}</textarea>
                </label>
                <label class="block mt-4 text-sm">
                    <input
                        @if(isset($manutencao) && $manutencao->realizado)
                            checked="checked"
                        @endif
                    type="checkbox"
                    name="realizado"
                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  />
                  <span class="ml-2">
                    Manutenção realizada
                  </span>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Realizada em</span>
                    <input placeholder="__/__/____" name="data_realizado" value="{{ isset($manutencao) && $manutencao->data_realizado ? \Carbon\Carbon::parse($manutencao->data_realizado)->format('d/m/Y') : '' }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input date"/>
                </label>
                <br>
                <br>
                <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Salvar
                </button>

                <a class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('manutencao.index') }}">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
