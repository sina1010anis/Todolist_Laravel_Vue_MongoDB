<?php
namespace App\MyClass;

use Illuminate\Support\Facades\Cookie as FacadesCookie;

class CookieEesy{
    private $status = false; // Check Cookie
    private $cookie ;

    public function __construct(public $nameCookie = 'uniq_cookie'){} //Set Name Cookie

    public function check()
    {
        $this->status = (!FacadesCookie::has($this->nameCookie)) ? false : true;

        return $this;
    }

    public function set($val , $time)
    {
        (!$this->status) ? FacadesCookie::queue($this->nameCookie , $val , $time) : $this->cookie = FacadesCookie::get($this->nameCookie) ;

        return $this;
    }

    public function get()
    {
        ($this->status) ? $this->cookie = FacadesCookie::get($this->nameCookie) : abort(404);

        return $this->cookie;
    }
}
?>
