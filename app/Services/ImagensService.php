<?php

namespace App\Services;

use App\Interfaces\ImagensRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagensService
{

    protected ImagensRepositoryInterface $repository;

    public function __construct( ImagensRepositoryInterface $repository)
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

    public function store($files, $idImovel, $caminho)
    {
        foreach($files as $foto){
            if(is_file($foto)){
                $this->repository->create($foto, $idImovel, $caminho);
            }
        }
        
    }

    public function getById(int $idImovel)
    {
        return $this->repository->getById($idImovel);

    }



    
}