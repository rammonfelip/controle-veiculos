<?php

namespace App\Contracts;

interface VeiculoInterface
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
     * Insere um novo registro no banco
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * Atualiza a informação do veículo
     * @param string $id
     * @param array $data
     * @return mixed
     */
    public function update(string $id, array $data);

    /**
     * Deleta um veículo
     * @param string $id
     * @return mixed
     */
    public function delete(string $id);
}
