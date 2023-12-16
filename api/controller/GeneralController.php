<?php

function getAbout()
{
    try {
        $data = global_select_single("about", "*", "slug='about'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data About");
    }
}

function bannerList()
{
    try {
        $data = global_select("banners", "*", false, "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Banner");
    }
}

function getFounder()
{
    try {
        $data = global_select_single("founders", "*", "type='founder'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Founder");
    }
}

function getCoFounder()
{
    try {
        $data = global_select("founders", "*", "type='co-founder'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Co-Founder");
    }
}