<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImagensRepositoryInterface
{
    public function getAll($imovelId);
    public function getById($imageId);
    public function delete($imageId);
    public function create(Request $request, $idImovel, $caminho); 
    public function getAllByUser(int $userId, string $filter = null); 
}