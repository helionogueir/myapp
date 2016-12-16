<?php

namespace source\core\environment;

class CrossVersion {

  public function prepare() {
    $this->checkSession();
    if (empty($_SESSION["user"])) {
      $this->contructSessetion();
    }
    return null;
  }

  private function checkSession() {
    $destroy = true;
    if ($user = $this->getSessionV1()) {
      if (!empty($user["v1"]["sessionPath"]) && !empty($_SESSION["v1"]["sessionPath"]) && file_exists($_SESSION["v1"]["sessionPath"]) && ($_SESSION["v1"]["sessionPath"] != $user["v1"]["sessionPath"])) {
        $destroy = false;
      }
    }
    if ($destroy) {
      session_destroy();
    }
  }

  private function contructSessetion() {
    if ($user = $this->getSessionV1()) {
      if (!empty($user["v1"]["sessionPath"])) {
        $_SESSION["v1"] = Array("sessionPath" => $user["v1"]["sessionPath"]);
        if (!empty($user["id_usuario"]) && !empty($user["id_parceiro"]) && !empty($user["nome_usuario"]) && !empty($user["login_usuario"])) {
          $pattern = "/^(.*)( +)(.*)$/";
          $_SESSION["user"] = Array(
            "id" => $user["id_usuario"],
            "idPartner" => $user["id_parceiro"],
            "nickname" => $user["nome_usuario"],
            "firstname" => null,
            "lastname" => null,
            "fullname" => $user["nome_usuario"],
            "email" => $user["login_usuario"]
          );
          if (preg_match($pattern, $user["nome_usuario"])) {
            $_SESSION["user"]["firstname"] = preg_replace($pattern, "$1", $user["nome_usuario"]);
            $_SESSION["user"]["lastname"] = preg_replace($pattern, "$3", $user["nome_usuario"]);
          }
          return null;
        }
      }
    }
  }

  private function getSessionV1(): Array {
    $user = Array();
    $sessionLocal = ini_get("session.save_path");
    $sessionExternal = "/var/lib/php5/sessions";
    session_write_close();
    ini_set("session.save_path", $sessionExternal);
    session_start();
    if (!empty($_SESSION["user"])) {
      $user = $_SESSION["user"];
      $user["v1"] = Array("sessionPath" => $sessionExternal . DIRECTORY_SEPARATOR . "sess_" . session_id());
    }
    session_write_close();
    ini_set("session.save_path", $sessionLocal);
    session_start();
    return $user;
  }

}
