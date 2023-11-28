<?php

namespace App\Repositories;

use App\Interfaces\ImoveisRepositoryInterface;

use App\Models\Imovel;

class ImoveisRepository implements ImoveisRepositoryInterface
{
    protected $model;

    public function __construct(Imovel $imoveis)
    {
        $this->model = $imoveis;
    }
    
    public function getAll(string $filter = null)
    {
        if($filter != null){
            return $this->model->where('cidade','LIKE','%'.$filter.'%')
                ->orWhere('bairro','LIKE','%'.$filter.'%')
                ->orWhere('valor','LIKE','%'.$filter.'%')
                ->orWhere('rua','LIKE','%'.$filter.'%')->paginate(8);
        }
        return $this->model->paginate(8);
    }

    public function getAllByUser(int $userId, string $filter = null)
    {
        if($filter != null){
            return $this->model->where('cidade','LIKE','%'.$filter.'%')
                ->orWhere('bairro','LIKE','%'.$filter.'%')
                ->orWhere('valor','LIKE','%'.$filter.'%')
                ->orWhere('rua','LIKE','%'.$filter.'%')
                ->where('user_id', $userId)->paginate(4);
        }
        
            return $this->model->where('user_id', $userId)->paginate(8);
    }
            
    public function getById($imovelId)
    {
        return $this->model->findOrFail($imovelId);
    }
    public function delete($imovelId)
    {
        $this->model->destroy($imovelId);
    }

    public function create(array $imoveisDetails)
    {
       
        return $this->model->create($imoveisDetails);   
    }

    public function update($imovelId, array $newImovel)
    {
        return $this->model->whereId($imovelId)->update($newImovel);
    }
}