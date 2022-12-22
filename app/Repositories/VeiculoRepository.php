<?php

namespace App\Repositories;

use App\Contracts\VeiculoInterface;
use App\Models\Veiculo;

class VeiculoRepository implements VeiculoInterface
{
    public function __construct(
        protected Veiculo $model
    ) {}

    public function listAll()
    {
       return $this->model->all();
    }

    public function find(string $id)
    {
        return $this->model->find($id);
    }

    public function findBy(array $filter)
    {
        return $this->model->where($filter)->get();
    }

    public function store(array $data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id']
            ], $data);
    }

    public function delete(string $id)
    {
        return $this->model->destroy($id);
    }
}
