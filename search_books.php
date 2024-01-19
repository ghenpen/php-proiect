<?php

$api_key = "AIzaSyAbMsS1tE5gRpBLRzEaHSuMPkfE80GddCY";

$search_terms = $_GET['searchInput'];

// Construiește URL-ul pentru solicitare
$request_url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($search_terms) . "&key=" . $api_key;


$response = file_get_contents($request_url);

$data = json_decode($response, true);


if ($data && array_key_exists('items', $data)) {
    $results = array();
    
    foreach ($data['items'] as $book) {
        $results[] = array(
            'title' => $book['volumeInfo']['title'],
            'authors' => $book['volumeInfo']['authors'],
        );
    }

    header('Content-Type: application/json');
    echo json_encode($results);
} else {
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Nu s-au găsit rezultate.'));
}
?>
