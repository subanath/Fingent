<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class IPThrottler implements FilterInterface
{
        
  public function before(RequestInterface $request, $arguments = null)
  {
    $throttler = Services::throttler();

    // Restrict an IP address to no more
    // than 1 request per second across the
    // entire site.
    echo $throttler->check($request->getIPAddress(), 10, MINUTE);
    print($request->getIPAddress());
    if ($throttler->check('pawn', 5, MINUTE) === false)
    {
      return Services::response()->setStatusCode(429);
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}