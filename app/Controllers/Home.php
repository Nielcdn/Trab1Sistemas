<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\LivrosModel;
use App\Models\EmprestModel;

class Home extends BaseController
{
    public function index()
    {
        $data['username'] = "";
        $data['nome'] = "";
        $data['email'] = "";
        $data['senha'] = "";
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
    public function formLogout()
    {
        session_destroy();
        return redirect()->to('/');
    }

    public function formLivro()
    {
        return view('addLivro');
    }

    public function telinha():string
    {

        $my_model = new UsuariosModel();
        $result = $my_model->findAll();

        $livro_my_model = new LivrosModel();
        $livro_result = $livro_my_model->findAll();

        $emprest_my_model = new EmprestModel();
        $emprest_result = $emprest_my_model->findAll();

        $data['result'] = $result;
        $data['livro_result'] = $livro_result;
        $data['emprest_result'] = $emprest_result;

        $infoAtual = $this->session->get();
        $data['username'] = substr($infoAtual['email'],0,strpos($infoAtual['email'],'@')); 
        if (session()->get('resultados')) $data['resultados'] = $infoAtual['resultados']; 
        echo "<br>";


        $db = \Config\Database::connect();
        $builder = $db->table('emprest');

        $data['emprestimos'] = $builder->select()->join('usuarios', 'usuarios.id = emprest.userId')->join('livros', 'livros.id = emprest.livroId')->where('usuarios.email',$this->session->get('email'))->get()->getResult('array');        

        
        return view('menu',$data);

    }

    public function admin()
    {
        $my_model = new UsuariosModel();
        $result = $my_model->findAll();

        $livro_my_model = new LivrosModel();
        $livro_result = $livro_my_model->findAll();

        $emprest_my_model = new EmprestModel();
        $emprest_result = $emprest_my_model->findAll();

        $data['result'] = $result;
        $data['livro_result'] = $livro_result;
        $data['emprest_result'] = $emprest_result;

        $infoAtual = $this->session->get();
        $data['username'] = substr($infoAtual['email'],0,strpos($infoAtual['email'],'@')); 
        echo "<br>";


        $db = \Config\Database::connect();
        $builder = $db->table('emprest');

        $data['emprestimos'] = $builder->select()->join('usuarios', 'usuarios.id = emprest.userId')->join('livros', 'livros.id = emprest.livroId')->where('usuarios.email',$this->session->get('email'))->get()->getResult('array');    
        if (session()->get('adm')){
            return view('adm',$data);
        }
        else return view('login',$data);
    }

    public function recebeCadastro()
    {
        $data = array(
            'nome' => $this->request->getVar('nome'),
            'email' => $this->request->getVar('email'),
            'senha'=> password_hash($this->request->getVar('senha'), PASSWORD_BCRYPT)
        );
        $db = \Config\Database::connect();
        $builder = $db->table('usuarios');
        $id = $builder->select()->get()->getResult('array');
        if (!$id) {
            $data['admin'] = TRUE;
            $this->session->set('adm','Você é um Administrador do site!!!!!!');
        }
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
        $id = $builder->select('nome, email, senha, admin')->where('email', $data['email'])->get()->getResult('array');
        if (!$id){
            $this->session->setFlashdata('erro','Erro!! Email ou senha não estão corretos!!!!');
            return redirect()->to('/login');
        }
        else {
        if (password_verify($data['senha'],$id[0]['senha'])){
            $this->session->set('logado','Login feito com sucesso!!!');
            if ($id[0]['admin']==1){
                $this->session->set('adm','Você é um Administrador do site!!!!!!');
            }
            $this->session->set('nome',$id[0]['nome']);
            $this->session->set('email',$id[0]['email']);
            return redirect()->to('/menu');
        }
        else{
            $this->session->setFlashdata('erro','Erro!! Email ou senha não estão corretos!!!!');
            return redirect()->to('/login');
        }
        }
    }

    public function recebeLivro()
    {
        $data = array(
            'autores' => $this->request->getVar('autores'),
            'titulo' => $this->request->getVar('titulo'),
            'ano' => $this->request->getVar('ano'),
            'editora'=> $this->request->getVar('editora'),
            'quantDisp'=> $this->request->getVar('quantDisp'),
        );
        $my_model = new LivrosModel();
        $my_model->insert($data);

        $this->session->set($data);

        $this->session->setFlashdata('insertSuccess','Dados inseridos com sucesso');

        
        return redirect()->to('/adm');

        //return view('view_formulario',$data);
    }

    public function pegarItem($num)
    {
        if (session()->get('logado')){
            $db = \Config\Database::connect();
            $builder_livro = $db->table('livros');
            $livro= $builder_livro->select('userEmprest, quantDisp')->where('id', $num)->get()->getResult('array');

            $nome = $this->session->get('nome');
            $email = $this->session->get('email');

            if ($livro[0]['quantDisp']!=0){
                    $livro_mudar = array(
                    'userEmprest'=> $livro[0]['userEmprest'].', '.$nome,
                    'quantDisp' => $livro[0]['quantDisp']-1
                    );

            $builder_livro->where('id',$num)->update($livro_mudar);

            $userId = $db->table('usuarios')->select('id')->where('email',$email)->get()->getResult('array')[0];
            $data_emprest = array(
                'userId' => $userId,
                'livroId' => $num
            );
            $emprest_model = new EmprestModel();
            $emprest_model->insert($data_emprest);

            }
            else {
            }
            return redirect()->to('menu');
        }
        else{
            return redirect()->to('login');
        }

    }

    public function devolverItem($num)
    {
        if (session()->get('logado')){
            $db = \Config\Database::connect();
            $builder_livro = $db->table('livros');
            $livro= $builder_livro->select('userEmprest, quantDisp')->where('id', $num)->get()->getResult('array');

            $nome = $this->session->get('nome');
            $email = $this->session->get('email');

            
            $livro_mudar = array(
            'userEmprest'=> substr($livro[0]['userEmprest'],0, strpos($livro[0]['userEmprest'],$nome)).substr($livro[0]['userEmprest'], strpos($livro[0]['userEmprest'],$nome)+strlen($livro[0]['userEmprest'])),
            'quantDisp' => $livro[0]['quantDisp']+1
            );

            $builder_livro->where('id',$num)->update($livro_mudar);

            $userId = $db->table('usuarios')->select('id')->where('email',$email)->get()->getResult('array')[0];
            $emprestId = $db->table('emprest')->select('id')->where('userId',$userId)->where('livroId',$num)->get()->getResult('array')[0];
            $data_emprest = array(
                'id' => $emprestId['id'],
                'userId' => $userId['id'],
                'livroId' => $num
            );
            $emprest_model = new EmprestModel();
            $emprest_model->delete($data_emprest);

        }
            return redirect()->to('menu');
    }

    public function deletarUsuario()
    {
        $id = $this->request->getVar('id');
        $my_model = new UsuariosModel();
        $my_model->delete($id);
        return redirect()->to('adm'); 
    }


    public function editarUsuario(){

        $my_model = new UsuariosModel();
        $id_var = $this->request->getVar('id');
        $result = $my_model->find($id_var);
        $data['result'] = $result;
        return view('editarUsuario',$data);
    }

    public function updateUsuario(){

        $id_var = $this->request->getVar('id_for_updating');
        $data = array(
            'nome' => $this->request->getVar('nome_edit'),
            'email' => $this->request->getVar('email_edit'),
            'senha' => password_hash($this->request->getVar('senha_edit'), PASSWORD_BCRYPT)
        );
        $my_model = new UsuariosModel();
        $result = $my_model->update($id_var,$data);
        $this->session->setFlashdata('updateSuccess','Dados atualizados com sucesso');


        return redirect()->to('adm'); 

    }

    public function deletarLivro()
    {
        $id = $this->request->getVar('id');
        $livro_model = new LivrosModel();
        $livro_model->delete($id);
        return redirect()->to('adm'); 
    }

    public function editarLivro(){

        $livro_model = new LivrosModel();
        $id_var = $this->request->getVar('id');
        $result = $livro_model->find($id_var);
        $data['result'] = $result;
        return view('editarLivro',$data);
    }

    public function updateLivro(){

        $id_var = $this->request->getVar('id_for_updating');
        $data = array(
            'autores' => $this->request->getVar('autores_edit'),
            'titulo' => $this->request->getVar('titulo_edit'),
            'ano' => $this->request->getVar('ano_edit'),
            'editora' => $this->request->getVar('editora_edit'),
            'quantDisp' => $this->request->getVar('quantDisp_edit'),
        );
        $livro_model = new LivrosModel();
        $result = $livro_model->update($id_var,$data);
        $this->session->setFlashdata('updateSuccess','Dados atualizados com sucesso');


        return redirect()->to('adm'); 

    }

    public function pesquisar(){
        $tipo = $this->request->getVar("tipo");
        $db      = \Config\Database::connect();
        $builder = $db->table('livros');
        if ($tipo=="todos"){
            $result = $builder->select()->get()->getResult('array');
        }
        if ($tipo=="porAno"){
            $result = $builder->select()->orderBy('ano','DESC')->get()->getResult('array');
        }
        if ($tipo=="porTitulo"){
            $mysearch = $this->request->getVar("titulo");
            $result = $builder->like('titulo', $mysearch)->get()->getResult('array');
        }
        $this->session->set('resultados',$result);
        return redirect()->to('menu');
    }



}