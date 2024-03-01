<?php

namespace App\Traits;

trait ResponseTrait
{
    private array $response;

    public function getResponse($code = 200, $message = "success", $data = [], $errors = [],$paginator=[])
    {
        $response['result'] = $code >= 200 && $code < 300 ? "success" : "failed";
        $response['code'] = $code;
        $response['timestamp'] = date('Y-m-d H:i:s', time());
        $response['message'] = $message;

        // Only include 'errors' key if errors array is not empty
        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        // Only include 'data' key if data is not null
        if (!empty($data)) {
            $response['data'] = $data;
        }
        if (!empty($paginator)) {
            $response['data'] += [
                'totalItems' => $paginator->total(),
                'itemPerPage' => $paginator->count(),
                'totalPages' => $paginator->lastPage(),
                'currentPage' => $paginator->currentPage(),
            ];
        }


        return response()->json($response, $code);
    }
}
