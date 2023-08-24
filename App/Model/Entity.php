<?php

namespace App\Model;

class Entity
{

    private $db = null;
    private $table = 'product';

    function __construct( \PDO $db = null )
    {
        $this->db = $db;
        $this->init_table();
    }

    function init_table()
    {
        $sql = "
create table if not exists `".$this->table."` (
    `id` INTEGER PRIMARY KEY,
    `sku` TEXT,
    `title` TEXT
    )
";
        $this->db->exec($sql);
    }

    function set( string $sku, string $title, int $id = 0 )
    {
        if ( !$id ) {
            $sql = "insert into ".$this->table." ( sku, title ) values ( :sku, :title )";
            $sth = $this->db->prepare( $sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
            $sth->execute(['sku' => $sku, 'title' => $title]);
            $id = $this->db->lastInsertId();
            $sql = "select * from ".$this->table." where id = ".$id;
            $sth = $this->db->query($sql, \PDO::FETCH_ASSOC);
            return $sth->fetch();
        } else {
            // редактирование тут
        }
    }

    // function get(int $id) {
    // }

    function delete(int $id) {
        if ( $id ) {
            $sql = "delete from ".$this->table." where id = :id";
            $sth = $this->db->prepare( $sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
            $sth->execute(['id' => $id]);
            return 0;
        }
    }

    function getAll()
    {
        $sql = "SELECT * FROM ".$this->table." order by id desc";
        return $this->db->query($sql, \PDO::FETCH_ASSOC);
    }
}
