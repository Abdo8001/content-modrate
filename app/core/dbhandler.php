<?php
namespace MVC\core;

interface dbhandler{
    public function insert($data);
    public function update($data);
    public function delete($id);
    public function select();
}

