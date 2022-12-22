<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Manutencao;
use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $users = [
             ['id' => 1, 'name' => 'Rafael', 'email' => 'rafael@test.com', 'password' => Hash::make('rafael')],
             ['id' => 2, 'name' => 'Alessandro', 'email' => 'alessandro@test.com', 'password' => Hash::make('alessandro')],
         ];

         $veiculos = [
             ['id' => 1, 'user_id' => 1, 'marca' => 'Fiat',        'modelo' => 'Toro',     'versao' => '2.0', 'fabricacao' => '2022'],
             ['id' => 2, 'user_id' => 1, 'marca' => 'Volkswagen',  'modelo' => 'Jetta',    'versao' => '2.0', 'fabricacao' => '2022'],
             ['id' => 3, 'user_id' => 1, 'marca' => 'Renault',     'modelo' => 'Logan',    'versao' => '1.5', 'fabricacao' => '2015'],
             ['id' => 4, 'user_id' => 1, 'marca' => 'Toyota',      'modelo' => 'Hilux',    'versao' => '3.0', 'fabricacao' => '2021'],
             ['id' => 5, 'user_id' => 1, 'marca' => 'BMW',         'modelo' => 'BMW X5',   'versao' => '2.0', 'fabricacao' => '2022'],
             ['id' => 6, 'user_id' => 2, 'marca' => 'Fiat',        'modelo' => 'Toro',     'versao' => '2.0', 'fabricacao' => '2022'],
             ['id' => 7, 'user_id' => 2, 'marca' => 'Volkswagen',  'modelo' => 'Jetta',    'versao' => '2.0', 'fabricacao' => '2022'],
             ['id' => 8, 'user_id' => 2, 'marca' => 'Renault',     'modelo' => 'Logan',    'versao' => '1.5', 'fabricacao' => '2015'],
             ['id' => 9, 'user_id' => 2, 'marca' => 'Toyota',      'modelo' => 'Hilux',    'versao' => '3.0', 'fabricacao' => '2021'],
             ['id' => 10, 'user_id' => 2, 'marca' => 'BMW',        'modelo' => 'BMW X5',   'versao' => '2.0', 'fabricacao' => '2022'],
         ];

         $manutencoes = [
             ['veiculo_id' => 1, 'agendamento' => '2022-12-25', 'descricao' => 'Trocar óleo', 'realizado' => false, 'data_realizado' => null],
             ['veiculo_id' => 2, 'agendamento' => '2022-12-27', 'descricao' => 'Manutenção preventiva', 'realizado' => false, 'data_realizado' => null],
             ['veiculo_id' => 3, 'agendamento' => '2022-12-24', 'descricao' => 'Alinhamento e Balanceamento', 'realizado' => true, 'data_realizado' => '2022-12-24'],
             ['veiculo_id' => 4, 'agendamento' => '2022-12-25', 'descricao' => 'Troca de velas e pastilha dos freios', 'realizado' => true, 'data_realizado' => '2022-12-25'],
             ['veiculo_id' => 5, 'agendamento' => '2023-01-05', 'descricao' => 'Alinhamento e Balanceamento', 'realizado' => false, 'data_realizado' => null],
             ['veiculo_id' => 6, 'agendamento' => '2022-12-25', 'descricao' => 'Trocar óleo', 'realizado' => false, 'data_realizado' => null],
             ['veiculo_id' => 7, 'agendamento' => '2022-12-27', 'descricao' => 'Manutenção preventiva', 'realizado' => false, 'data_realizado' => null],
             ['veiculo_id' => 8, 'agendamento' => '2022-12-24', 'descricao' => 'Alinhamento e Balanceamento', 'realizado' => true, 'data_realizado' => '2022-12-24'],
             ['veiculo_id' => 9, 'agendamento' => '2022-12-25', 'descricao' => 'Troca de velas e pastilha dos freios', 'realizado' => true, 'data_realizado' => '2022-12-25'],
             ['veiculo_id' => 10, 'agendamento' => '2023-01-05', 'descricao' => 'Alinhamento e Balanceamento', 'realizado' => false, 'data_realizado' => null],
         ];

         foreach ($users as $user) {
             User::create($user);
         }

         foreach ($veiculos as $veiculo) {
             Veiculo::create($veiculo);
         }

        foreach ($manutencoes as $manutencao) {
            Manutencao::create($manutencao);
         }
    }
}
