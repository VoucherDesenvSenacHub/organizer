<?php

class HttpClientUtil
{

    public function post($url, $payload)
    {
        $json = json_encode($payload, JSON_UNESCAPED_UNICODE);

        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json',
                'Content-Length: ' . strlen($json)
            ],
        ]);

        $responseBody = curl_exec($curl);
        $curlErr = curl_error($curl) ?: null;
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // Tenta decodificar JSON
        $decoded = json_decode($responseBody, true);
        if ($decoded === null && json_last_error() !== JSON_ERROR_NONE) {
            return [
                'success' => false,
                'error' => 'Resposta não é JSON válido.',
                'http_code' => $httpCode,
                'curl_error' => $curlErr,
                'raw_response' => $responseBody
            ];
        }
        if ($httpCode < 200 || $httpCode >= 300) {
            $msg = $decoded['message'] ?? ($decoded['erro'] ?? 'Resposta com código HTTP ' . $httpCode);
            return [
                'success' => false,
                'error' => $msg,
                'http_code' => $httpCode,
                'raw' => $decoded
            ];
        }

        $id = $decoded['id'] ?? ($decoded['cartao']['id'] ?? null);
        $situacao = $decoded['situacao'] ?? null;

        return [
            'success' => true,
            'id' => $id,
            'situacao' => $situacao,
            'raw' => $decoded
        ];
    }
}
