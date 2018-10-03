<?php
class UsuarioController extends Controller{
  
  
  function __construct(){
    parent::__construct();//Cargar todos los models
    $this->usuario = new Usuario;
  }
  
  
//  function index(){
//    echo "Index desde UsuarioController";
//  }
//  
//  function create(){
//    echo "Create desde UsarioController";
//  }
  
//  function index(){
//    
//    //Cargamos la vista index y le pasamos los valores
//    $this->view("usuario",array(
//      "prueba"=>'El usuario'
//    ));
//  }
  
  function index(){

    $dat = $this->usuario->getAll();
      
    if($_SESSION['login']==true){
      $this->view("usuario",["dat"=>$dat]);
      
    }else{
      $this->view('inicio');
    }
    
  }
  
  function login(){
    $user = $this->usuario->getBy('nombre',$this->user);
    $pass1 = crypt($this->pass, $user[0]->contrasena);
    $pass2 = crypt($this->pass, $user[0]->contrasena);
    if(hash_equals($pass1,$pass2)){
      $_SESSION['login']=true;
      $_SESSION['usuario']=$user;
      
      $this->usuario->setId($user[0]->id);
      $_SESSION['menu'] = $this->usuario->itemUsuario();
      
      echo json_encode(['salida'=>'redirect',
                      'c'=>'inicio',
                     'a'=>'index']);
    }else{
      echo json_encode(['salida'=>'modal',
                      'msj'=>'El usuario o constraseña son icorrectos',
                     'title'=>'Mensaje']);
    }
//    echo "Login";
//    var_dump($user);
    
  }
  
  function create(){
    $this->view("usuarioCreate");
  }
  
  function store(){
//    echo $this->name;
    $this->usuario->setNombre($this->name);
    $this->usuario->setDocumento($this->num_doc);
    $this->usuario->setContrasena($this->contrasena);
    $this->usuario->guardar();
    echo json_encode(['salida'=>'modal',
                      'msj'=>'El usuario se ha guardado correctamente',
                     'title'=>'Mensaje']);
//    echo json_encode(['salida' => 'redirect',
//                     'c' => 'usuario',
//                    'a' => 'index']);
  }
  
  function edit(){
//    echo $this->id;
    $datos = (array) $this->usuario->getById($this->id);
    echo $this->view('editUsuario',$datos);
  }
  
  function update(){
    $this->usuario->setNombre($this->name);
    $this->usuario->setDocumento($this->num_doc);
    $this->usuario->actualizar();
    echo json_encode(['salida' => 'redirect',
                     'c' => 'usuario',
                    'a' => 'index']);
  }
  
  function delete(){
    $this->usuario->deleteById($this->id);
    echo json_encode(['salida'=>'redirect',
                      'c'=>'usuario',
                     'a'=>'index']);
  }
  
  function show(){
//    echo $this->id;
    $datos = (array) $this->usuario->getById($this->id);
    echo $this->view('showUsuario',$datos);
  }
}