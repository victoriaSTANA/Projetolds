<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReuniaoModel;
use App\Models\User;

class ReuniaoController extends Controller
{

    private $objUser;
    private $obtReuniao;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objReuniao = new ReuniaoModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniao = $this->objReuniao->all();
        return view('dashboard', compact('reuniao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad = $this->objReuniao->create(
            [
                'titulo'=>$request->titulo,
                'descricao'=>$request->descricao,
                'data'=>$request->data,
                'id_user'=>$request->id_user
            ]
            );
        $file = $request->file('arquivo');    
        if(isset($file)){
        if($request->file('arquivo')->isValid()){
            $namefile = $request->titulo . '.' . $request->data;
            $request->file('arquivo')->storeAs('public/arquivos', $namefile);
        }
        }

        if($cad){
            return redirect('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reuniao = $this->objReuniao->find($id);
        return view('show', compact('reuniao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reuniao = $this->objReuniao->find($id);
        $users = $this->objUser->all();

        return view('create', compact('reuniao', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ed = $this->objReuniao->where(['id'=>$id])->update(
            [
                'titulo'=>$request->titulo,
                'descricao'=>$request->descricao,
                'data'=>$request->data,
                'id_user'=>$request->id_user
            ]
        );
        if($ed){
        return redirect ('dashboard');
        } else {
            dd($ed);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objReuniao->destroy($id);
        return($del)?"sim":"não";
    }
}
