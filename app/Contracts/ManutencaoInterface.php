<?php

namespace App\Contracts;

interface ManutencaoInterface
{
    /**
     * Retorna todos os veículos
     * @return mixed
     */
    public function listAll();

    /**
     * Retorna os dados do veículo solicitado
     * @param string $id
     * @return mixed
     */
    public function find(string $id);

    /**
     * Retorna os registros baseados no filtro solicitado
     * @param array $filter
     * @return mixed
     */
    public function findBy(array $filter);

    /**
     * Insere um novo registro no banco
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * Deleta um veículo
     * @param string $id
     * @return mixed
     */
    public function delete(string $id);
}
