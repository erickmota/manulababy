<?php

/* Iniciando classe */
include "../classes/compra.class.php";
$classeCompra = new compra();

$idCliente = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", htmlentities(base64_decode($_COOKIE["iu_mb"])));

$classeCompra->idCliente = $idCliente;

if($classeCompra->retorna_pedidos_por_cliente()){

?>

<thead>
    <tr>
    <th scope="col">Cód</th>
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
                        
foreach($classeCompra->retorna_pedidos_por_cliente() as $arrPedido){

    $data = new DateTime($arrPedido["data_hora"]);
    $referencia = $arrPedido["id"];

    $status = $classeCompra->retornar_status_compra_pagseguro($arrPedido["id"])["status"];

?>

    <tr>
    <th class="align-middle" scope="row"><?php echo $arrPedido["id"] ?></th>
    <td class="align-middle">R$<?php echo number_format(floatval($classeCompra->retornar_status_compra_pagseguro($arrPedido["id"])["valor"]), 2, ",", ".") ?></td>
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
    <td class="align-middle"><?php echo $arrPedido["status_entrega"] ?></td>
    <td><?php
    
    if($classeCompra->organizar_status_pagseguro($status) == "Não finalizada" || $classeCompra->organizar_status_pagseguro($status) == "Cancelada"){

    ?>

        <button onclick="window.location='php/apagarPedidoAoCancelar.php?idU=<?php echo $idCliente; ?>&referencia=<?php echo $referencia; ?>&ind=sim'" type="button" class="btn btn-danger btn-sm">Apagar</button>

    <?php

    }
    
    ?></td>
    <td><?php
    
    if($classeCompra->organizar_status_pagseguro($status) == "Não finalizada"){

    ?>

        <button type="button" class="btn btn-primary btn-sm" disabled>Detalhes</button>

    <?php

    }else{

    ?>

        <button onclick="window.location='detalhe-pedido?ref=<?php echo $referencia; ?>'" type="button" class="btn btn-primary btn-sm">Detalhes</button>

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