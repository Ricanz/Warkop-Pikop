<?php

class ApiResponse
{
    public static function sendResponse($data, $message = 'Berhasil')
    {
        header('Content-Type: application/json');
        echo json_encode(['status' => true, 'message' => $message, 'data' => $data]);
        exit;
    }

    public static function sendErrorResponse($data = null, $message = 'Gagal')
    {
        header('Content-Type: application/json', true, 400);
        echo json_encode(['status' => false, 'message' => $message, 'data' => $data]);
        exit;
    }
}

?>