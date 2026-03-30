<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #0a1c3a;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            ;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
   

    <div class="content">
        <p>Bonjour {{ $auteur->prenom }} {{ $auteur->nom }},</p>

        <p>Nous avons le plaisir de vous confirmer que votre commande a été validée avec succès.</p>

        <p><strong>Détails de la commande :</strong></p>
        <ul>
            <li><strong>Numéro de commande :</strong> CMD-{{ str_pad($auteur->id, 5, '0', STR_PAD_LEFT) }}</li>
            <li><strong>Date :</strong> {{ $auteur->created_at->format('d/m/Y H:i') }}</li>
            <li><strong>Email :</strong> {{ $auteur->email }}</li>
            <li><strong>Téléphone :</strong> {{ $auteur->numero }}</li>
            @if($auteur->contact_what)
            <li><strong>Adresse :</strong> {{ $auteur->contact_what }}</li>
            @endif
        </ul>

        <p><strong>Produits commandés :</strong></p>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Produit</th>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Prix Unitaire</th>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Quantité</th>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">État</th>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item['libelle'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ number_format($item['prix'], 0, ',', ' ') }} FCFA</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $item['qttestock'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $item['etat'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ number_format($item['prix'] * $item['qttestock'], 0, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="font-size: 18px; font-weight: bold; text-align: right;">Total de la commande : {{ number_format($total, 0, ',', ' ') }} FCFA</p><br>

        <p style="text-align: center; font-size: 14px; color: #272727; font-weight:bold; ">NB : Veuillez suivre les instructions ci dessous afin de finaliser votre paiement. </p><br>

        <p> 1)  Contacter le service client a ce numéro : <a href="https://wa.me/237690720568" target="_blank"> <span style="  font-weight:bold;  "> 690 72 05 68 </span></a> </p>
        
        <p> 2)  Effectuer la transaction via le code ci dessous : <span style="display:inline-block; background-color:#f8f9fa; padding:10px 20px; font-size:18px; font-weight:bold; color:#333;">*126*4*489188*Montant # / Nom marchand : 2N CORPORATE SARL </span></p> ou 
       <p><span style="display:inline-block; background-color:#f8f9fa; padding:10px 20px; font-size:18px; font-weight:bold; color:#333;"># 150*47 # / Code marchand : 964527 / Nom marchand : 2N CORPORATE SARL </span></p>
        <p> 3)  Envoyer une capture d'écran de votre paiement suivi de votre numéro de commande au service client.</p><br>

        <p>Cordialement,<br>
        L'équipe Shop2ncorporate</p>
    </div>

    <div class="footer">
        <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
    </div>
</body>
</html>
