<?php

namespace App\Interfaces;

interface ImoveisRepositoryInterface
{
    public function getAll(string $filter = null);
    public function getById($imovelId);
    public function delete($imovelId);
    public function create(array $orderDetails);
    public function update($imovelId, array $newDetails);   
    public function getAllByUser(int $userId, string $filter = null); 
}