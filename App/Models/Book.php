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


    // запит до бд, для отримання масиву всіх книг
    public static function getAll():array
    {
        // замінити ід жанрів на назву жанрів
        $stmt = self::$db->query("
        SELECT b.id, b.name AS name, b.author AS author_name, b.year, g.name AS genre_name, b.inStock
        FROM books b
        LEFT JOIN genres g ON b.genreId = g.id
    ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // отримати масив книг, які є в наявності
    public static function getInStock()
    {
        $stmt = self::$db->prepare("SELECT * FROM books WHERE inStock = :inStock");
        $stmt->execute(['inStock' => true]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // змінити значення inStock
    public function setInStock(bool $inStock): bool
    {
        $sql = "UPDATE books SET inStock = :inStock WHERE id = :id";
        $stmt = self::$db->prepare($sql);
        return $stmt->execute(['inStock' => $inStock, 'id' => $this->id]);
    }


//отримати книгу як об'єкт за заданим ід
    public static function getById($id)
    {
        $stmt = self::$db->prepare('SELECT * FROM books WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(__CLASS__);
    }

    // метод зміни або створення запису бд
    // якщо книга з заданою ід існує, то редагуємо її
    // якщо книга не існує, створюємо запис
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

    //матод для повернення книги
    public function return(): void
    {
        $book = Book::getById($this->id); // отримати ід конкретної книги

        if ($book) {

            //змінити значення inStock на true і записати в бд
            $book['inStock'] = true;
            $sql = 'UPDATE books SET inStock = :inStock WHERE id = :id';
            $stmt = self::$db->prepare($sql);
            $stmt->execute(['inStock' => $book['inStock'], 'id' => $book['id']]);
        }
    }


    // метод для видалення книги
    public function delete(): void
    {
        $stmt = self::$db->prepare('DELETE FROM books WHERE id = :id');
        $stmt->execute(['id' => $this->id]);
    }
}
