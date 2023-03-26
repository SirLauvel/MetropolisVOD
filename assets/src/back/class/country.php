<?php 

class Country
{
// Properties
private $name;
private $initial;
// Methods

public function addCountry(string $nameInput) {
    $bd = Access::getBdd();
    $req = "INSERT INTO `country`(`name_country`) VALUE(:name_country)";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'name_country' => $nameInput
    ]);
}
public static function getName($id_category) {
    $bd = Access::getBdd();
    $req = "SELECT name_country FROM country WHERE id_country = :id_country";
    $stmt = $bd->prepare($req);
    $stmt->execute(['id_country' => $id_category]);
    $name_country = $stmt->fetch();

    return $name_country;
}
public static function getAll() {
    $bd = Access::getBdd();
    $req = "SELECT * FROM country";
    $stmt = $bd->query($req);
    $stmt->execute();
    $countryTable = $stmt->fetchAll();

    return $countryTable;
}

public static function deleteCountry($id_country) {
    $bd = Access::getBdd();
    $req = "DELETE FROM country WHERE id_contry = :id_country";
    $stmt = $bd->prepare($req);
    $stmt->execute([
        'id_country' => $id_country
    ]);
}
}