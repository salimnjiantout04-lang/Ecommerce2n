<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture - 2N Corporate</title>
    <style>
        body {
            background: #f7f9fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #222;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 650px;
            margin: 10px auto 0 auto;
            border-radius: 8px;
            box-shadow: 0 1px 6px rgba(44, 62, 80, 0.06);
            padding: 12px 8px 10px 8px;
            border: 1.5px solid #1a237e;
        }
        .logo {
            width: 60px;
            height: auto;
        }
        .company-details {
            font-size: 10px;
            color: #1a237e;
            line-height: 1.3;
            margin-top: 6px !important;
        }
        .facture-info {
            font-size: 11px;
            color: #1a237e;
            font-weight: 600;
            margin-bottom: 6px !important;
        }
        .client-details {
            font-size: 10px;
            color: #222;
            margin-top: 3px;
        }
        h1 {
            color: #1a237e;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 7px;
            letter-spacing: 1px;
        }
        .invoice-table table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 7px;
            font-size: 10px;
        }
        .invoice-table th {
            background: #1a237e;
            color: #fff;
            font-size: 11px;
            padding: 4px 3px;
            border: 1px solid #ffd600;
        }
        .invoice-table td {
            padding: 3px 2px;
            border: 1px solid #ffd600;
            background: #f9f9fb;
        }
        .totals table {
            width: 100%;
            font-size: 10px;
        }
        .totals td {
            padding: 2px 2px;
            border: none;
        }
        .totals tr td:first-child {
            color: #1a237e;
            font-weight: 500;
        }
        .totals tr:last-child td {
            font-size: 12px;
            font-weight: bold;
            color: #ffd600;
        }
        .footer1 {
            font-size: 9px;
            border-bottom: 1px solid #ffd600;
            color: #1a237e;
            margin-top: 10px;
            padding-bottom: 3px;
        }
        .footer {
            text-align: center;
            font-size: 9px;
            color: #888;
            margin-top: 4px;
        }
        a {
            color: #1a237e;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px;">
        <div style="flex: 1; min-width: 220px; display: flex; flex-direction: column; align-items: flex-start;">
            <div style="display: flex; flex-direction: row; align-items: flex-start; width: 100%;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/Gemini_Generated_Image_64jw0s64jw0s64jw.png'))) }}" alt="2N CORPORATE SHOP" class="logo">
                <div class="facture-info" style="margin-left: 30px; text-align: right; align-self: flex-start;">
                    <strong>Facture N°:</strong> {{ $numeroFacture }}<br>
                    <strong>Date d’émission:</strong> {{ date('d/m/Y') }}
                </div>
            </div>
            <div style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; margin-top: 10px;">
                <div class="company-details" style="text-align: left;">
                    FACE ANCIEN CINEMA FOHATO<br>
                    DOUALA-BONABERI ANCIENNE ROUTE<br>
                    Tel: +237 695 015 788/+237 696 82 68 81<br>
                    Email: info@2ncorporate.com<br>
                    N°Registre de commerce: RC/DLA/2022/B/854<br>
                    NIU: M022217039932W<br>
                    BP:12535 Douala<br>
                    <a href="http://www.2ncorporate.com">2ncorporate.com</a>
                </div>
                <div class="client-details" style="text-align: right; min-width: 220px;">
                    <strong>Informations du Client</strong><br>
                    Nom : {{ $nom }}<br>
                    Prénom : {{ $prenom }}<br>
                    Numéro de téléphone : {{ $phone }}<br>
                    Adresse : {{ $adresse }}
                </div>
            </div>
        </div>
    </div>
    <div class="invoice-table">
        <table>
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>État</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $item)
                    @php $total0 = $item['prix'] * $item['qttestock']; @endphp
                    <tr>
                        <td>{{ $item['libelle'] }}</td>
                        <td>{{ number_format($item['prix'], 0, ',', ' ') }} FCFA</td>
                        <td>{{ $item['qttestock'] }}</td>
                        <td>{{ $item['etat'] }}</td>
                        <td>{{ number_format($total0, 0, ',', ' ') }} FCFA</td>
                    </tr>
                    @php $total += $total0; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="totals">
        <table>
            <tr>
                <td>Sous-total :</td>
                <td style="text-align:right">{{ number_format($total, 0, ',', ' ') }} FCFA</td>
            </tr>
            <tr>
                <td>TVA (0%) :</td>
                <td style="text-align:right">0 FCFA</td>
            </tr>
            <tr>
                <td><strong>Total à payer :</strong></td>
                <td style="text-align:right"><strong>{{ number_format($total, 0, ',', ' ') }} FCFA</strong></td>
            </tr>
        </table>
    </div>
    <div style="clear:both"></div>
    <footer class="footer1">
        <p>
            * Délai de paiement 48h<br>
            * Récupérez vos produits dans tous nos points de vente<br>
            <strong>Merci pour vos achats !</strong>
        </p>
    </footer>
    <footer class="footer">
        <p>
            Ceci est une facture générée automatiquement et ne nécessite pas de signature.<br>
            Pour toute question, contactez-nous.
        </p>
    </footer>
</div>

</body>
</html>
