<?php

namespace App\Model;

class BrandManager extends AbstractManager
{

    const TABLE = 'brand';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function update(array $data)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . "
                SET name=:name            
                WHERE id=:id
            ");
        $statement->bindValue('name', $data['name'], \PDO::PARAM_STR);
        $statement->bindValue('id', $data['id'], \PDO::PARAM_INT);
        $statement->execute();
    }

    public function selectFromUniverse(string $universe): array
    {
        $query = 'SELECT DISTINCT b.name AS brand_name FROM ' . ProductManager::TABLE . ' p 
                    JOIN ' . UniverseManager::TABLE . ' u ON p.universe_id = u.id 
                    JOIN ' . self::TABLE . ' b ON p.brand_id = b.id 
                    WHERE u.name = :universe ORDER BY b.name ASC';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('universe', $universe, \PDO::PARAM_STR);
        $statement->execute();
        $brands = $statement->fetchAll();
        return $brands;
    }

    public function delete(int $id)
    {
        $query = 'DELETE from ' . self::TABLE . ' WHERE id=:id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function insert(array $data)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . "
               (name) VALUES (:name)");
        $statement->bindValue('name', $data['name'], \PDO::PARAM_STR);
        $statement->execute();
    }

    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table . ' ORDER BY name')->fetchAll();
    }
}
