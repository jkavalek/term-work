<?php

include "Config.php";
class Db
{
	/**
	 * @var PDO Databázové spojení
	 */
	private static $connection;


	/**
	 * @var array Výchozí nastavení ovladače
	 */
	private static $options = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_EMULATE_PREPARES => false,
	);

	/**
	 * Připojí se k databázi pomocí daných údajů
	 * @param string $host Název hostitele
	 * @param string $database Název databáze
	 * @param string $user Uživatelské jméno
	 * @param string $password Heslo
	 */
	public static function connect()
	{
		if (!isset(self::$connection)) {
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
			self::$connection = new PDO($dsn, DB_USER, DB_PASSWORD, self::$options);
		}
	}

	/**
	 * Spustí dotaz a vrátí PDO statement
	 * @param array $params Pole, kde je prvním prvkem dotaz a dalšími jsou parametry
	 * @return \PDOStatement PDO statement
	 */
	private static function executeStatement($params)
	{
		$query = array_shift($params);
		$statement = self::$connection->prepare($query);
		$statement->execute($params);
		return $statement;
	}

	/**
	 * Spustí dotaz a vrátí počet ovlivněných řádků. Dále se předá libovolný počet dalších parametrů.
	 * @param string $query Dotaz
	 * @return int Počet ovlivněných řádků
	 */
	public static function query($query) {
		$statement = self::executeStatement(func_get_args());
		return $statement->rowCount();
	}




	/**
	 * Spustí dotaz a vrátí všechny jeho řádky jako pole asociativních polí. Dále se předá libovolný počet dalších parametrů.
	 * @param string $query Dotaz
	 * @return mixed Pole řádků enbo false při neúspěchu
	 */
	public static function queryAll($query) {
		$statement = self::executeStatement(func_get_args());
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}


}