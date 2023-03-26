<?php 
class Category
{
// Properties
// Methods

public function __construct(int $id_category) {
    

}

public function AddCategory(string $nameInput) {
    $bd = Access::getBdd();
    $req = "INSERT INTO `category`(`name_category`) VALUE(:name_category)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_category' => $nameInput
    ]);
}
public static function getAll() {
    $bd = Access::getBdd();
    $req = "SELECT * FROM category";
    $stmt = $bd->query($req);
    $stmt->execute();
    $categoryTable = $stmt->fetchAll();

    return $categoryTable;
}

public static function getByMovie($id_movie) {
    $bd = Access::getBdd();
    $req = "SELECT name_category FROM movie_category AS l INNER JOIN category AS c ON l.id_category = c.id_category WHERE id_movie = ?";
    $stmt = $bd->prepare($req);
    $stmt->execute([$id_movie]);
    $categoryTable = $stmt->fetchAll();

    return $categoryTable;
}

public static function deleteCountry(int $id_category) {
    $bd = Access::getBdd();
    $req = "DELETE FROM category WHERE id_category = :id_category";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_category' => $id_category
    ]);
}
}