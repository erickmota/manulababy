<?php

/* Iniciando classe */
include "../classes/compra.class.php";
$classeCompra = new compra();

/* $idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", base64_decode($_COOKIE["iu_oj"])); */

/* $classeCompra->idCliente = $idCliente; */

$busca = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlspecialchars($_POST["busca"], ENT_QUOTES, "UTF-8"));

$funcRetornaPedido = $classeCompra->retorna_pedido_adm($busca);

if($funcRetornaPedido != false){

?>

<thead>
    <tr>
    <th scope="col">Cód</th>
    <th scope="col">Cliente</th>
    <th scope="col">Valor</th>
    <th scope="col">Data / Hora</th>
    <th scope="col">Status pagamento</th>
    <th scope="col">Status Entrega</th>
    <th scope="col"></th>
    <th scope="col"></th>
    </tr>
</thead>

<tbody>

<?php
                        
foreach($funcRetornaPedido as $arrPedido){

    $data = new DateTime($arrPedido["data_hora"]);
    $referencia = $arrPedido["id_pedido"];
    $idCliente = $arrPedido["id_cliente"];

    $status = $classeCompra->retornar_status_compra_pagseguro($arrPedido["id_pedido"])["status"];

?>

    <tr>
    <th class="align-middle" scope="row"><?php echo $arrPedido["id_pedido"] ?></th>
    <td class="align-middle"><?php echo $arrPedido["nome"] ?></td>
    <td class="align-middle">R$<?php echo number_format(floatval($classeCompra->retornar_status_compra_pagseguro($arrPedido["id_pedido"])["valor"]), 2, ",", ".") ?></td>
    <td class="align-middle"><?php echo $data->format('d/m/Y H:i');?></td>
    <td class="align-middle <?php
    
    if($classeCompra->organizar_status_pagseguro($status) == "Paga"){

        echo "text-success";

    }else if($classeCompra->organizar_status_pagseguro($status) == "Aguardando pagamento"){

        echo "text-info";

    }else if($classeCompra->organizar_status_pagseguro($status) == "Não finalizada"){

        echo "text-black-50";

    }
    
    ?>"><?php
    
    /* echo $classeCompra->retornar_status_compra_pagseguro($arrPedido["id"]); */
    echo $classeCompra->organizar_status_pagseguro($status);
    
    ?></td>
    <td class="align-middle">

        <select class="form-select" onchange="alterar_status_entrega(this.value, <?php echo $referencia; ?>)" <?php
        
        if($classeCompra->organizar_status_pagseguro($status) == "Não finalizada"){

            echo "disabled";

        }
        
        ?>>

            <option value="Em processamento" <?php
            
            if($arrPedido["status_entrega"] == "Em processamento"){

                echo "selected";

            }
            
            ?>>Em processamento</option>
            <option value="Preparando produto" <?php
            
            if($arrPedido["status_entrega"] == "Preparando produto"){

                echo "selected";

            }
            
            ?>>Preparando produto</option>
            <option value="Em transporte" <?php
            
            if($arrPedido["status_entrega"] == "Em transporte"){

                echo "selected";

            }
            
            ?>>Em transporte</option>
            <option value="Entregue" <?php
            
            if($arrPedido["status_entrega"] == "Entregue"){

                echo "selected";

            }
            
            ?>>Entregue</option>

        </select>

    </td>
    <td class="align-middle"><?php
    
    if($classeCompra->organizar_status_pagseguro($status) == "Não finalizada" || $classeCompra->organizar_status_pagseguro($status) == "Cancelada"){

    ?>

        <button onclick="window.location='php/apagar_pedido_adm.php?idU=<?php echo $idCliente; ?>&referencia=<?php echo $referencia; ?>'" type="button" class="btn btn-danger btn-sm">Apagar</button>

    <?php

    }else if($classeCompra->organizar_status_pagseguro($status) == "Paga"){

    ?>

        <a href="php/adm_gerar_declaracao_conteudo.php?ip=<?php echo $referencia; ?>" target="_blank" onclick="window.open('php/adm_gerar_etiqueta_correios.php?ip=<?php echo $referencia; ?>')"><button type="button" class="btn btn-success btn-sm">Etiquetas</button></a>

    <?php

    }
    
    ?></td>
    <td class="align-middle"><?php
    
    if($classeCompra->organizar_status_pagseguro($status) == "Não finalizada"){

    ?>

        <button type="button" class="btn btn-primary btn-sm" disabled>Detalhes</button>

    <?php

    }else{

    ?>

        <a href="detalhe-pedido?ref=<?php echo $referencia; ?>" target="_blank"><button type="button" class="btn btn-primary btn-sm">Detalhes</button></a>

    <?php

    }
    
    ?></td>
    </tr>

<?php

}

?>

</tbody>

<?php

}else{

?>

<div class="container-fluid">

    <div class="row mt-4">

        <div class="col text-secondary text-center">

            <span>NENHUM REGISTRO ENCONTRADO</span>

        </div>

    </div>

</div>

<?php

}

?>