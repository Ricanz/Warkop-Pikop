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

function getContact()
{
    try {
        $data = global_select_single("contact", "*", "id='1'", "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Contact");
    }
}

function franchiseList()
{
    try {
        $data = global_select("products", "*", false, "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Franchise");
    }
}

function newsList()
{
    try {
        $data = global_select("news", "*", false, "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Berita");
    }
}

function careerList()
{
    try {
        $data = global_select("careers", "*", false, "ID DESC ");

        ApiResponse::sendResponse($data);
    } catch (\Throwable $th) {
        ApiResponse::sendErrorResponse(null, "Gagal mengambil data Karir");
    }
}