<?php

include "../classes/compra.class.php";
$classeCompra = new compra();

$cep = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities($_POST["cep"]));
$peso = htmlentities($_POST["peso"]);
$altura = htmlentities($_POST["altura"]);
$largura = htmlentities($_POST["largura"]);
$comprimento = htmlentities($_POST["comprimento"]);
$dias_entrega = htmlentities($_POST["dias_entrega"]);
$preco_total_sacola = htmlentities($_POST["preco_total_sacola"]);
$desconto_frete = str_replace(",", ".", htmlentities($_POST["desconto_frete"]));

/* 04014 = sedex */
/* 04510 = PAC */

/* $classeCompra->calcular_frete($cep, $peso, $altura, $largura, $comprimento, "04510"); */

$calcular04510 = $classeCompra->calcular_frete($cep, $peso, $altura, $largura, $comprimento, "04510");
$calcular04014 = $classeCompra->calcular_frete($cep, $peso, $altura, $largura, $comprimento, "04014");

?>

<div class="col text-center">

    <?php
    
    if($calcular04510[2] == ""){

        /* Primeiro numero do CEP de Sorocaba e último número do CEP de Votorantim */
        if($cep > "18000001" && $cep < "18119999"){

        ?>

            <select id="selectFrete" class="text-secondary" onchange="retorna_codigo_pagseguro(this.value, <?php echo $preco_total_sacola ?>, <?php echo $desconto_frete ?>)">

            <option disabled selected hidden value="vazio">Selecione o tipo de entrega</option>
            <option value="GRATIS-0.00-<?php echo $dias_entrega + 1; ?>">Frete Grátis - <?php echo $dias_entrega + 1; ?> dias para entrega</option>

            </select>

            <br><br><b>FRETE GRÁTIS</b> - <?php echo $dias_entrega + 1; ?> dias úteis para entrega

        <?php

        }else{

        ?>

            <select id="selectFrete" class="text-secondary" onchange="retorna_codigo_pagseguro(this.value, <?php echo $preco_total_sacola ?>, <?php echo $desconto_frete ?>)">

            <option disabled selected hidden value="vazio">Selecione o tipo de entrega</option>
            <option value="PAC-<?php echo $calcular04510[0]; ?>-<?php echo $calcular04510[1] + $dias_entrega; ?>">PAC: R$<?php echo $calcular04510[0]; ?> - <?php echo $calcular04510[1] + $dias_entrega; ?> dias úteis para entrega</option>
            <option value="SEDEX-<?php echo $calcular04014[0]; ?>-<?php echo $calcular04014[1] + $dias_entrega; ?>">SEDEX: R$<?php echo $calcular04014[0]; ?> - <?php echo $calcular04014[1] + $dias_entrega; ?> dias úteis para entrega</option>

            </select>

            <br><br><b>PAC:</b> R$<?php echo $calcular04510[0]; ?> - <?php echo $calcular04510[1] + $dias_entrega; ?> dias úteis para entrega<br>
            <b>SEDEX:</b> R$<?php echo $calcular04014[0]; ?> - <?php echo $calcular04014[1] + $dias_entrega; ?> dias úteis para entrega

        <?php

        }
    
    }else{
    
    ?>

    <span class="text-black-50"><?php echo $calcular04510[2]; ?></span><br><br>
    <span class="text-info">Problemas para calcular o frete? contato@oscarjoias.com</span>

    <?php
    
    }
    
    ?>

</div>