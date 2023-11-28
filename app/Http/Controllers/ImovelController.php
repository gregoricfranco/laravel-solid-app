<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImoveisRequest;
use App\Services\ImagensService;
use App\Services\ImovelService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    private $serviceImovel;
    private $serviceImagem;

    public function __construct(ImovelService $serviceImovel, ImagensService $serviceImagem)
    {
        $this->serviceImovel = $serviceImovel;
        $this->serviceImagem = $serviceImagem;
    }

    public function index(Request $request): View
    {

        $search = $request->search;
        $imoveis= $this->serviceImovel->getAllByUser($search);

        return view('imovel.index', [       
            'imoveis' =>  $imoveis,
            'search' => $search
        ]);
    }

    public function add(): View
    {
        return view('imovel.cadastro');
    }

    public function alugados(): View
    {
        return view('imovel.alugados');
    }

    public function store(StoreImoveisRequest $request)
    {   
        $files = $request->file('files');
        $caminho = '/images/imobiliaria/';
        
        $imovel = $this->serviceImovel->store($request->validated());
        $this->serviceImagem->store($files, $imovel->id, $caminho);
        
        return redirect()->route('imoveis')
            ->with('message','Imovel criado com sucesso.');
    }
}
