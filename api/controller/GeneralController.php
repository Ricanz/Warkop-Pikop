<?php

function getAbout()
{
    try {
        $data = global_select_single("about", "*", "slug='about' AND status='active'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data About");
    }
}

function bannerList()
{
    try {
        $data = global_select("banners", "*", "status='active'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Banner");
    }
}

function getFounder()
{
    try {
        $data = global_select_single("founders", "*", "type='founder' AND status='active'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Founder");
    }
}

function getCoFounder()
{
    try {
        $data = global_select("founders", "*", "type='co-founder' AND status='active'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Co-Founder");
    }
}

function getContact()
{
    try {
        $data = global_select_single("contact", "*", "id='1' AND status='active'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Contact");
    }
}

function franchiseList()
{
    try {
        $data = global_select("products", "*", "status='active'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Franchise");
    }
}

function newsList()
{
    try {
        $data = global_select("news", "*", "status='active'", "ID DESC LIMIT 6");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Berita");
    }
}

function careerList()
{
    try {
        $data = global_select("careers", "*", "status='active'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Karir");
    }
}