<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function upload($request,$filed='file',$dir='images',$disks='public')
    {
    	//判断是否有文件上传   是否是有效文件
        if($request->hasFile($filed) && $request->file($filed)->isValid()){
            //获取文件信息
            $head_img = $request->file($filed);
            //保存   参数1:文件目录  参数2:文件系统 查看comfig\filesystemss.php
            $path = $head_img->store($dir,$disks);
            //删除文件 Storage::disk('public')->delete('file.jpg');
            return $path;
        }
        return '';
    }

    /**
     * @param $requestUri
     * @param null $data
     * @param bool $json
     * @return mixed
     * @throws GuzzleException
     */
    public function post($requestUri,$data=null,$json=false)
    {
       $client = new Client();
        $type = $json?'body':'form_params';

        $response = $client->request('POST', $requestUri, [
            'headers' =>array(
                'Accept'=>'Application/json',
                'Content-Type'=>'application/x-www-form-urlencoded',
            ),
            'form_params' => $data
        ]);
        return $this->getResponseResult($response);
    }

    /**
     * @param $requestUri
     * @return mixed
     * @throws GuzzleException
     */
    public function get($requestUri)
    {
        $client = new Client();

        $response = $client->request('GET', $requestUri, [
            'headers' =>array(
                'Accept'=>'Application/json',
                'Content-Type'=>'application/x-www-form-urlencoded',
            ),
        ]);
        return $this->getResponseResult($response);
    }


    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    private function getResponseResult(ResponseInterface $response)
    {
        $body = $response->getBody()->getContents();
        return $body;
    }

    public function check($requestUri){
        $check = strpos($requestUri, '?');
        if($check !== false){
            if(substr($requestUri, $check+1) == '') {

            } else {
                $requestUri = $requestUri.'&';
            }
        }
        else{
            $requestUri = $requestUri.'?';
        }

        return $requestUri;
    }

}
