@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="w-full mb-8 overflow-hidden rounded-lg">
    <div class="w-full overflow-x-auto">
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                  </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Veículos</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $veiculos }}</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" /> </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Manutenções</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $veiculos }}</p>
                </div>
            </div>
        </div>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Próximos Agendamentos</h4>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                  <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
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
    </div>
</div>
@endsection
