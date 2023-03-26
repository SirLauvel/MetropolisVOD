<?php class Access {

    public static function getBdd() {
        try {
            $bd = new PDO(
                'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
                'root',
                '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
            return $bd;
            
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}