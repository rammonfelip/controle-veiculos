<?php

namespace App\Repositories;

use App\Contracts\ManutencaoInterface;
use App\Models\Manutencao;

class ManutencaoRepository implements ManutencaoInterface
{
    public function __construct(
        protected Manutencao $model
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

    public function findByUser(string $userId)
    {
        return $this->model->whereRelation('veiculo', 'user_id', $userId)->get();
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
