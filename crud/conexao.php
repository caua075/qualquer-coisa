<?php

$conf = [
    "driver" => "mysql",
    "server" => "db",
    "user" => "root",
    "password" => "C@!232104",
    "database" => "mysql",
    "port" => "3306",
    "debug" => true
];

$string_connection = "{$conf['driver']}:dbname={$conf['database']};host={$conf['server']};port={$conf['port']}";

try {
    $conn = new PDO(
        $string_connection,
        $conf["user"],
        $conf["password"]
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($conf['debug']) {
        echo "<p>Conexão realizada com sucesso!</p>";
    }

} catch (Exception $e) {
    echo "<p>Erro ao se conectar no banco de dados. </p>";
    if ($conf['debug']) {
        echo $e->getMessage();
    }
}
?>
