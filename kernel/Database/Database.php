<?php

namespace App\Kernel\Database;

use App\Kernel\Config\ConfigInterface;

class Database implements DatabaseInterface
{

    public function __construct(
        private ConfigInterface $config,
    )
    {
        $this->connect();
    }

    public function insert(string $table, array $data): int|false
    {
        $keys = implode(', ', array_keys($data));
        $values = implode("', '", array_values($data));
        $query = "INSERT INTO $table ($keys) VALUES ('$values')";

        return mysqli_query($this->mysql, $query) ? mysqli_insert_id($this->mysql) : false;
    }

    public function first(string $table, array $conditions = []): ?array
    {
        $query = "SELECT * FROM $table";

        if (!empty($conditions)) {
            $query .= ' WHERE ' . implode(' AND ', array_map(function ($key) use ($conditions) {
                    return "$key = '{$conditions[$key]}'";
                }, array_keys($conditions))).' LIMIT 1';
        }
        $result = mysqli_query($this->mysql, $query);

        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function get(string $table, array $conditions = []): ?array
    {
        $query = "SELECT * FROM $table";

        if (!empty($conditions)) {
            $query .= ' WHERE ' . implode(' AND ', array_map(function ($key) use ($conditions) {
                    return "$key = '{$conditions[$key]}'";
                }, array_keys($conditions)));
        }
        $result = mysqli_query($this->mysql, $query);

        if ($result) {
            return mysqli_fetch_all($result);

        } else {
            return null;
        }
    }


    public function delete(string $table, array $conditions = []): bool
    {
        $query = "DELETE * FROM $table";

        if (!empty($conditions))
        {
            $query .= ' WHERE ' . implode(' AND ', array_map(function ($key) use ($conditions) {
                return "$key = '{$conditions[$key]}'";
        }, array_keys($conditions)));
        }
        $result = mysqli_query($this->mysql, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    private function connect(): void
    {
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $user = $this->config->get('database.user');
        $password = $this->config->get('database.password');
        $this->mysql = mysqli_connect($host, $user, $password, $database, $port) or die('Could not connect to MySQL: ' . mysqli_connect_error());
    }


}