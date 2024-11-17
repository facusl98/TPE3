<?php

require_once './app/models/peli.model.php';
require_once './app/views/json.view.php';

class PeliApiController{
    private $model;
    private $view;


    public function __construct(){
        $this->model = new PeliModel();
        $this->view = new JSONView();
    }

    public function getAll($req, $res){


        $orderBy = false;
        if(isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;


        $pelis = $this->model->getPelis($orderBy);

        return $this->view->response($pelis);
    }

    public function get($req, $res){

        $id = $req->params->id;

        $peli = $this->model->getPeli($id);

        if(!$peli) {
            return $this->view->response("La pelicula con el id = $id no existe", 404);
        }


        return $this->view->response($peli);


    }



    public function create($req, $res){
        //valido los datos
        if (empty($req->body->nombre) || empty($req->body->director) || empty($req->body->fecha_estreno)) {
            $body = $req->body;
            var_dump($body);
            return $this->view->response('Faltan completar datos', 400);
        }

        //obtengo los datos
        $nombre = $req->body->nombre;
        $director = $req->body->director;
        $fecha = $req->body->fecha_estreno;

         // inserto los datos
         $id = $this->model->insertPelis($nombre, $director, $fecha);

         if (!$id) {
             return $this->view->response("Error al insertar pelicula", 500);
         }
 
         //devuelvo el recurso insertado
         $peli = $this->model->getPeli($id);
         return $this->view->response($peli, 201);
 

    }


    public function update($req, $res) {
        $id = $req->params->id;

        // verifico que exista
        $peli = $this->model->getPeli($id);
        if (!$peli) {
            return $this->view->response("La pelicula con el id=$id no existe", 404);
        }

         // valido los datos
         if (empty($req->body->nombre) || empty($req->body->director) || empty($req->body->fecha_estreno)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $nombre = $req->body->nombre;
        $director = $req->body->director;
        $fecha = $req->body->fecha_estreno;

        // actualiza la tarea
        $this->model->editarPeli($id, $nombre, $director, $fecha);

        // obtengo la tarea modificada y la devuelvo en la respuesta
        $peli = $this->model->getPeli($id);
        $this->view->response($peli, 200);
    }






}