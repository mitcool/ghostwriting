<?php
 
namespace App\Exceptions;
 
use Exception;
 
class InvalidOrderException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }
 
    public function render($request){
        $url = $request->url();
        $loweredCaseUrl = strtolower($url);
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException && $url !== $loweredCaseUrl) 
        {
            return redirect($loweredCaseUrl);
        }
        else if($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
            return redirect()->route('404');
        }
        return parent::render($request, $exception);
    }
}