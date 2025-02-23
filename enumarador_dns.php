<?php
function enumerarDNS($dominio) {

    $tipos = ['A', 'MX', 'NS', 'TXT', 'SOA'];
    
    foreach ($tipos as $tipo) {
        echo "Consultando registros $tipo para $dominio...\n";

        $registros = dns_get_record($dominio, constant("DNS_$tipo"));
        
        if (!empty($registros)) {
            foreach ($registros as $registro) {
                print_r($registro);
            }
        } else {
            echo "Nenhum registro $tipo encontrado.\n";
        }
        echo "\n";
    }
}

if (isset($argv[1])) {
    $dominio = $argv[1];
    enumerarDNS($dominio);
} else {
    echo "Por favor, Digite o domínio como argumento.\n";
    echo "Exemplo de uso: php dns_enumerador.php exemplo.com\n";
}
?>
