<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $seats = $_POST["selectedSeatInput"];
    $id = $_POST["id"];
    $selectedSeats = explode(",", $seats);

    $tr['playing_id'] = $id;
    $tr['total_ticket'] = $_POST['totalTicket'];
    $tr['total_price'] = $_POST['totalPrice'];
    $tr['status'] = 'done';
    $tr['dibayar'] = $_POST['dibayar'];
    $tr['kembalian'] = $_POST['kembalian'];
    $tr['created_at'] = date("Y-m-d H:i:s");
    

    $save = global_insert_return_id('transactions', $tr);
    
    $result = saveSelectedSeats($selectedSeats, $id, $save);
    if ($save) {
        redirectWithMessage("../playing.php", "Berhasil transaksi tiket bioskop");
    }
    
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["selectedSeats"]) && isset($_POST["id"])) {
    $selectedSeats = $_POST["selectedSeats"];
    $id = $_POST["id"];

    // Simpan ke database
    $result = saveSelectedSeats($selectedSeats, $id, 0);

    if ($result) {
        echo "Proses berhasil!";
    } else {
        echo "Proses gagal!";
    }
}

function saveSelectedSeats($selectedSeats, $id, $trId)
{
    global $db;

    // Lakukan loop untuk setiap kursi yang dipilih
    foreach ($selectedSeats as $seatId) {
        $seatPart = substr($seatId, 5);
        // Gunakan prepared statement untuk mencegah SQL injection
        $stmt = $db->prepare("INSERT INTO seats (playing_id, taken, transaction_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $id, $seatPart, $trId); // Sesuaikan dengan jenis data kolom playing_id dan taken

        // Eksekusi prepared statement
        $stmt->execute();

        // Tutup prepared statement
        $stmt->close();
    }

    // Return true jika berhasil, false jika gagal
    return true;
}
