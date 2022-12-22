<?php

namespace App\Repositories;

use App\Contracts\VeiculoInterface;
use App\Models\Veiculos;

class VeiculoRepository implements VeiculoInterface
{
    public function listAll()
    {
       return Veiculos::all();
    }

    public function find(string $id)
    {
        return Veiculos::find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function update(string $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(string $id)
    {
        // TODO: Implement delete() method.
    }
}
