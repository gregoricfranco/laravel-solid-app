<?php

namespace App\Services;

use App\Interfaces\ImoveisRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ImovelService
{

    protected ImoveisRepositoryInterface $repository;

    public function __construct( ImoveisRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all(string $search = null) 
    {
        return $this->repository->getAll($search);
    }

    public function getAllByUser(string $filter= null)
    {
        return $this->repository->getAllByUser(Auth::user()->id, $filter);

    }

    public function store(array $imovel)
    {
       
        $imovel['user_id'] = Auth::user()->id;
        return $this->repository->create($imovel);
       
    }

    public function getById(int $idImovel)
    {
        return $this->repository->getById($idImovel);

    }



    
}