<?php

namespace App\Repositories;

use App\Interfaces\ImagensRepositoryInterface;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagensRepository implements ImagensRepositoryInterface
{
    protected $model;

    public function __construct(Image $imagens)
    {
        $this->model = $imagens;
    }
    
    public function getAll($imovelId)
    {
        return $this->model->paginate(8);
    }

    public function getAllByUser(int $userId, string $filter = null)
    { 
        
        $query = $this->model->where('user_id', $userId);
        if ($filter) {
            $query->where('image', 'LIKE', "%{$filter}%");
        }

        return $query->paginate(8);
    }
            
    public function getById($imovelId)
    {
        return $this->model->findOrFail($imovelId);
    }
    public function delete($imovelId)
    {
        $this->model->destroy($imovelId);
    }

    public function create($file, $idImovel, $caminho)
    {  
        $imageName = time() . rand(1, 99) . '.' . $file->getClientOriginalExtension();
        $imageDirectory = $caminho . Auth::user()->name;
        $file->move(public_path($imageDirectory), $imageName);
       
        $this->model->create([
            'image'=> $imageDirectory . '/' . $imageName,
            'imovel_id' => $idImovel
        ]);
    }

}