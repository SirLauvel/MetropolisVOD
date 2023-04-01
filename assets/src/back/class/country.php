<?php
class Country
{
    // Properties
    private $name;
    private $initial;
    // Methods

    public function addCountry(string $nameInput)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "INSERT INTO `country`(`name_country`) VALUE(:name_country)";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'name_country' => $nameInput
        ]);
    }
    public static function getName($id_category)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "SELECT name_country FROM country WHERE id_country = :id_country";
        $stmt = $bd->prepare($req);
        $stmt->execute(['id_country' => $id_category]);
        $name_country = $stmt->fetch();

        return $name_country;
    }
    public static function getAll()
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "SELECT * FROM country";
        $stmt = $bd->query($req);
        $stmt->execute();
        $countryTable = $stmt->fetchAll();

        return $countryTable;
    }

    public static function deleteCountry($id_country)
    {
        $bd = new PDO(
            'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        $req = "DELETE FROM country WHERE id_contry = :id_country";
        $stmt = $bd->prepare($req);
        $stmt->execute([
            'id_country' => $id_country
        ]);
    }
}