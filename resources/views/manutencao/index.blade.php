@extends('layouts.app')

@section('title', 'Listagem de Manutenções')

@section('content')
<div class="w-full mb-8 overflow-hidden rounded-lg">
    <div class="w-full overflow-x-auto">
        <a class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
           href="{{ route('manutencao.adicionar') }}">
            Adicionar
        </a>

        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
                <th class="px-4 py-3">Veículo</th>
                <th class="px-4 py-3">Agendamento</th>
                <th class="px-4 py-3">Descrição</th>
                <th class="px-4 py-3">Realizado</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse($manutencoes as $m)
                <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                        <div>
                            <p class="font-semibold">{{ $m->veiculo->modelo }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $m->veiculo->marca }} - {{ $m->veiculo->versao }} - {{ $m->veiculo->fabricacao }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($m->agendamento)->format('d/m/Y') }}</td>
                <td class="px-4 py-3 text-xs">{{ $m->descricao ?? '-' }}</td>
                <td class="px-4 py-3 text-sm">
                    @if($m->realizado)
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Realizado
                    </span>
                    @endif
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                        <a href="{{ route('manutencao.editar', $m->id) }}"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                        >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                            </svg>
                        </a>
                        <a href="{{ route('manutencao.excluir', $m->id) }}"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                        >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma manutenção por aqui</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
