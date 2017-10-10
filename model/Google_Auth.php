<?php

  class Google_Auth
  {

    protected $Cliente;

    function __construct(Google_Client $googleCliente = null)
    {

      $this->Cliente = $googleCliente;

      if ($this->Cliente)
      {
        $this->Cliente->setClientId('102509770679-spf3d0prn3r7ea8cjusv3p6et94in4v0.apps.googleusercontent.com');
        $this->Cliente->setClientSecret('w0V6aK3m6C0oLW9ztLJdyyHT');
        $this->Cliente->setApplicationName('Gestion del talento humano');
        $this->Cliente->setRedirectUri('http://localhost:88/PersonalUAB/view/Index/google.php');
        $this->Cliente->addScope('https://www.googleapis.com/auth/plus.login  https://www.googleapis.com/auth/userinfo.email');
      }

    }

    public function getAuthUrl()
    {
      return $this->Cliente->createAuthUrl();
    }

    public function checkRedirectCode()
    {
      if (isset($_GET['code']))
      {
        $token = $this->Cliente->fetchAccessTokenWithAuthCode($_GET['code']);
        $this->setToken($token);
        return true;
      }
      else
      {
        return false;
      }
    }

    public function setToken($token)
    {
      $_SESSION['access_token'] = $token;
      $this->Cliente->setAccessToken($token);
    }

  }

?>
