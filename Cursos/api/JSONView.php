<?php

class JSONView {

    /**
     * Convierte los datos de la respuesta a JSON y los imprime.
     */
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    /**
     * Devuelve un mensaje de error dado un código de error HTTP.
     */
    private function _requestStatus($code){
        $status = array(
          200 => "OK",
          204 => "Resource updated/deleted successfully",
          401 => "Unautorized",
          403 => "Forbidden",
          404 => "Not found",
          500 => "Internal Server Error",
          501 => "Internal error in Cursos web"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
      }
}
