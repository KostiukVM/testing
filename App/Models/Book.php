<?php

namespace App\Models;

use PDO;
use App\Kernel\Model;

class Book extends Model
{
    public int $id;
    public string $name;
    public string $author;
    public int $year;
    public int $genreId;
    public bool $inStock;


    public static function getAll()
    {
        $stmt = self::$db->query("
        SELECT b.id, b.name AS name, b.author AS author_name, b.year, g.name AS genre_name, b.inStock
        FROM books b
        LEFT JOIN genres g ON b.genreId = g.id
    ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getInStock()
    {
        $stmt = self::$db->prepare("SELECT * FROM books WHERE inStock = :inStock");
        $stmt->execute(['inStock' => true]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function setInStock(bool $inStock): bool
    {
        $sql = "UPDATE books SET inStock = :inStock WHERE id = :id";
        $stmt = self::$db->prepare($sql);
        return $stmt->execute(['inStock' => $inStock, 'id' => $this->id]);
    }



    public static function getById($id)
    {
        $stmt = self::$db->prepare('SELECT * FROM books WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(__CLASS__);
    }
    public function save(): void
    {
        if (isset($this->id)) {
            $stmt = self::$db->prepare('UPDATE books SET name = :name, author = :author, genreId = :genreId, year = :year WHERE id = :id');
            $stmt->execute([
                'id'      => $this->id,
                'name'    => $this->name,
                'author'  => $this->author,
                'year'    => $this->year,
                'genreId' => $this->genreId
            ]);

        } else {
            $stmt = self::$db->prepare('INSERT INTO books (name, author, year, genreId) VALUES (:name, :author, :year, :genreId)');
            $stmt->execute([
                'name'    => $this->name,
                'author'  => $this->author,
                'year'    => $this->year,
                'genreId' => $this->genreId
            ]);

        }
    }
    public function return(): void
    {
        $book = Book::getById($this->id);

        if ($book) {

            $book['inStock'] = true;
            $sql = 'UPDATE books SET inStock = :inStock WHERE id = :id';
            $stmt = self::$db->prepare($sql);
            $stmt->execute(['inStock' => $book['inStock'], 'id' => $book['id']]);
        }
    }

    public function delete()
    {
        $stmt = self::$db->prepare('DELETE FROM books WHERE id = :id');
        $stmt->execute(['id' => $this->id]);
    }
}
