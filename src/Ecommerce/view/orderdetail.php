<?php $date = (new DateTime($detail[0]["date"]))->format('d/m/Y à H:i'); ?>
<h3>Commande effectuée le <?php echo $date; ?></h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Articles</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($detail as $produit){ ?>
        <tr>
            <td>
                <?php echo $produit["nom"]; ?>
            </td>
            <td>
                <?php echo $produit["quantity"]; ?>
            </td>
            <td>
                <?php echo $produit["prix"]; ?>€
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<h4>Prix total de la commande :  <?php echo $produit["total"]; ?>€</h4>
