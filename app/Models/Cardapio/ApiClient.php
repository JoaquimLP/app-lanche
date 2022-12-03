<?php

namespace App\Models\Cardapio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiClient extends Model
{
    use HasFactory;

    public function produtoRequest( $page = null, $categoria = null)
    {
        $curl = curl_init();
        $params['token'] = "f7cce202-d30a-41e1-af47-e7197be1b780";
        if($categoria){
            $params['categoria'] = $categoria;
        }


        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8001/api/produto'. (isset($page) ? "?page=$page" : ""),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 1|C7u6lCMmImTi73Vsa1unxSZnFcjAkgVC08TrOFl9',
                'Content-Type: application/json',
                'Cookie: XSRF-TOKEN=eyJpdiI6IlRTWVJrTHErUnhiQkRqZDBxekZoUkE9PSIsInZhbHVlIjoiYUpQQURNSlN5UWFFamthN0JHM3ZMd3ZBcVJmdzB1a1padklqN2N1S3Z2NEtpd3NqWDJyZjFNS0xxcHplWENJWEd2RFZ5SU9FTm40b2E5K0NqVzR3bEpwczRrMzNIQ1Y0N1g1WVlrdWE2TjRKUkNndkJRODhXN24zS1dzRlNKdWgiLCJtYWMiOiJlZmZhM2I2YmQzOTdlY2YzNDRiOTk3OGM4NWNjOTFiNWVmNTMzODAzYjhkY2Q5ZDRmMTc1MmYzOGRkOGE4M2I5IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IktWQU5VdHlvOFY2blNxY1habHlVMmc9PSIsInZhbHVlIjoiS21vTDByRVU4Um9BU0J4aWVJbTBKalJESE5sOHVkWEc5TzQrNW1CN1U2TEZhYjUybi9hSHlESnMvcnJEalBNSWhrSWNJNVcxSUVTdC91UVQwTWxIa0dvMjF5Y1FHbTlPM24yKzF5V0hOcGlVYlJYcW9ER2FZdXZ5WGhjWStTU04iLCJtYWMiOiJiNGVlZDYzMTZiNWJlMTFmYmNmZThmZTM3YjdhNWZmYTU2NDM3M2RkNTJmMjg1MzU0MGI2MDdmYjhmYTUxNGFhIiwidGFnIjoiIn0%3D; token=NjQ0.2wnowdrWnWbDui0D74l_nFgt2F9dLyUZ_Qk1GZSf6zFgPEbwR4o9EqqVyDRh'
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            if($this->debug){
                dump($error);
            }
            return ['status' => false, 'data' => $error];
        } else {
            if($this->debug){
                dump($response);
            }
            return ['status' => true, 'data' => $response];
        }
    }

    public function buscarCep($cep)
    {
        $curl = curl_init();


        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://viacep.com.br/ws/$cep/json/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            if($this->debug){
                dump($error);
            }
            return ['status' => false, 'data' => $error];
        } else {
            if($this->debug){
                dump($response);
            }
            return ['status' => true, 'data' => $response];
        }

    }
}
