<?php

namespace App\Models;

use AllowDynamicProperties;
use App\Kernel\Model;
use PDO;

#[AllowDynamicProperties] class Record extends Model
{
    public int $visitorId;
    public int $bookId;
    public ?string $date_of_issue;
    public ?string $return_date = null;

    public static function getAll()
    {
        $stmt = "
    SELECT r.id, r.bookId, v.name AS visitor_name, b.name AS book_name, r.date_of_issue, r.return_date
    FROM records r
    JOIN visitors v ON r.visitorId = v.id
    JOIN books b ON r.bookId = b.id";

        $stmt = self::$db->prepare($stmt);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getBookIdsOutOfStock()
    {
        $stmt = "
    SELECT DISTINCT r.bookId
    FROM records r
    JOIN books b ON r.bookId = b.id
    WHERE b.inStock = false";

        $stmt = self::$db->prepare($stmt);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0); // Повертає масив з однією колонкою
    }


    public static function getById($id)
    {
        $stmt = self::$db->prepare("SELECT * FROM records WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function save(Record $record): bool
    {
        if (isset($record->id)) {
            $sql = "UPDATE records 
                    SET visitorId = :visitorId, bookId = :bookId, date_of_issue = :date_of_issue, return_date = :return_date 
                    WHERE id = :id";
            $params = [
                'visitorId' => $record->visitorId,
                'bookId' => $record->bookId,
                'date_of_issue' => $record->date_of_issue,
                'return_date' => $record->return_date,
                'id' => $record->id
            ];

            // Під час видачі книги оновлюємо статус inStock на false
            $updateBookSql = "UPDATE books SET inStock = false WHERE id = :bookId";
            $updateBookStmt = self::$db->prepare($updateBookSql);
            $updateBookStmt->execute(['bookId' => $record->bookId]);

        } else {
            $sql = "INSERT INTO records (visitorId, bookId, date_of_issue, return_date) 
                    VALUES (:visitorId, :bookId, :date_of_issue, :return_date)";
            $params = [
                'visitorId' => $record->visitorId,
                'bookId' => $record->bookId,
                'date_of_issue' => $record->date_of_issue,
                'return_date' => $record->return_date
            ];
            // Під час видачі книги оновлюємо статус inStock на false
            $updateBookSql = "UPDATE books SET inStock = false WHERE id = :bookId";
            $updateBookStmt = self::$db->prepare($updateBookSql);
            $updateBookStmt->execute(['bookId' => $record->bookId]);
        }

        $stmt = self::$db->prepare($sql);
        return $stmt->execute($params);
    }
}
