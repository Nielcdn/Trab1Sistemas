<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Home extends BaseController
{
    public function index(): string
    {
        $data['variavel'] = "Conteudo do controller";
        $data['nickname'] = "LordWenzel1978";
        $data['nome'] = "";
        $this->session->set($data);
        return view('my_view',$data);
    }

    public function apresenta_formulario(): string
    {
        return view('cadastro');
    }

    public function telinha():string
    {

        $my_model = new UsuariosModel();
        $result = $my_model->findAll();

        //print_r($result);
        $data['result'] = $result;
        $meuarray = $this->session->get();
        $data['nickname'] = $meuarray['nickname']; 
        print_r($data['result'][0]['nome']);

        $db      = \Config\Database::connect();
        $builder = $db->table('usuarios');


        $id = $builder->select('id', )->get()->getResult('array');

        return view('outra_view',$data);
    }

    public function receiveData()
    {
        $data = array(
            'nome' => $this->request->getVar('nome'),
            'email' => $this->request->getVar('email'),
            'senha'=> $this->request->getVar('senha'),
        );

        $my_model = new UsuariosModel();
        $my_model->insert($data);

        $this->session->set($data);

        $this->session->setFlashdata('insertSuccess','Dados inseridos com sucesso');

        
        return redirect()->to('/menu');

        //return view('view_formulario',$data);
    }

    public function deletarItem()
    {
        $id = $this->request->getVar('id');
        $my_model = new AutomoveisModel();
        $my_model->delete($id);
        return redirect()->to('menu'); 
    }
    
    public function deletarItemPorURL($num){
        $my_model = new AutomoveisModel();
        $my_model->delete($num);
        return redirect()->to('menu'); 

    }

    public function editarItem(){

        $my_model = new AutomoveisModel();
        $id_var = $this->request->getVar('id');
        $result = $my_model->find($id_var);

        //print_r($result);
        $data['result'] = $result;
        return view('formularioEdicao',$data);
    }

    public function updateData(){

        $id_var = $this->request->getVar('id_for_updating');
        $data = array(
            'marca' => $this->request->getVar('marca_edit'),
            'modelo' => $this->request->getVar('modelo_edit'),
            'km'=> $this->request->getVar('km_edit'),
            'ano'=> $this->request->getVar('ano_edit'),
            'preco' => $this->request->getVar('preco_edit')
        );

        $my_model = new AutomoveisModel();
        
        $result = $my_model->update($id_var,$data);
        $this->session->setFlashdata('updateSuccess','Dados atualizados com sucesso');


        return redirect()->to('menu'); 

    }

    public function pesquisar(){
        $mysearch = $this->request->getVar("pesquisa");


        $db      = \Config\Database::connect();
        $builder = $db->table('automoveis');


        $result = $builder->like('modelo', $mysearch)->get()->getResult('array');

    
        $data['result'] = $result;
        $meuarray = $this->session->get();
        $data['nickname'] = $meuarray['nickname']; 
        return view('outra_view',$data);
    }



}
