<?php
require_once __DIR__ . '/../config/cloudinary.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadResult = $cloudinary->uploadApi()->upload($_FILES['imagem']['tmp_name'], [
            'folder' => 'test_uploads',
            'public_id' => uniqid(),
        ]);

        echo "Imagem enviada com sucesso! URL: " . $uploadResult['secure_url'];
    } else {
        echo "Erro no upload da imagem.";
    }
} else {
    echo "Nenhuma imagem enviada.";
}
