<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Home extends BaseController
{
    public function index()
    {
        $data['username'] = "";
        $data['nome'] = "";
        $data['email'] = "";
        $data['senha'] = "";
        $data['adm'] = FALSE;
        $this->session->set($data);
        return redirect()->to('/menu');
    }

    public function formCadastro(): string
    {
        return view('cadastro');
    }

    public function formLogin(): string
    {
        return view('login');
    }

    public function telinha():string
    {

        $my_model = new UsuariosModel();
        $result = $my_model->findAll();

        $data['result'] = $result;
        $infoAtual = $this->session->get();
        $data['username'] = substr($infoAtual['email'],strpos($infoAtual['email'],'@')); 
        echo "<br>";

        $db = \Config\Database::connect();
        $builder = $db->table('usuarios');

        $id = $builder->select('email, senha')->get()->getResult('array');
        print_r(in_array(array('ewbriao1978@gmail.com'),$id));
        print_r($id);
        return view('menu',$data);
    }

    public function recebeCadastro()
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

    public function recebeLogin()
    {
        $data = array(
            'email' => $this->request->getVar('email'),
            'senha'=> $this->request->getVar('senha'),
        );

        $db = \Config\Database::connect();
        $builder = $db->table('usuarios');

        $id = $builder->select('email, senha')->where("email", $data['email'])->where("senha", $data['senha'])->get()->getResult('array');

        if (sizeof($id)!=0){
            $this->session->set($data);
            if (in_array('ewbriao1978@gmail.com',$id[0]))

            return redirect()->to('/menu');
        }
        else{
            $this->session->setFlashdata('erro','Erro!! Email ou senha não estão corretos!!!!');
            return redirect()->to('/login');
        }
        return redirect()->to('/menu');

    }

    public function deletarItem()
    {
        $id = $this->request->getVar('id');
        $my_model = new UsuariosModel();
        $my_model->delete($id);
        return redirect()->to('menu'); 
    }
    
    public function deletarItemPorURL($num){
        $my_model = new UsuariosModel();
        $my_model->delete($num);
        return redirect()->to('menu'); 

    }

    public function editarItem(){

        $my_model = new UsuariosModel();
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
