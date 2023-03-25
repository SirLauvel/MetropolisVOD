<?php class Category
{
// Properties
// Methods

public function __construct(string $nameInput) {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $req = "INSERT INTO `category`(`name_category`) VALUE(:name_category)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_category' => $nameInput
    ]);
}

public static function getAll() {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $req = "SELECT * FROM category";
    $stmt = $bd->query($req);
    $stmt->execute();
    $categoryTable = $stmt->fetchAll();

    return $categoryTable;
}

public static function deleteCountry(int $id_category) {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $req = "DELETE FROM category WHERE id_category = :id_category";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_category' => $id_category
    ]);
}
}