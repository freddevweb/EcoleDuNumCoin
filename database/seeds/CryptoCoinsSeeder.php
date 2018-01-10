<?php

use Illuminate\Database\Seeder;

class CryptoCoinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// bitcoin Etherium
		$coins = [
			[ 'name' => "bitcoin", 'describe' => "Bitcoin (de l'anglais bit : unité d'information binaire et coin « pièce de monnaie »), est d'une part une monnaie virtuelle de type monnaie cryptographiquenote 1 et d'autre part un système de paiement pair-à-pairnote 2, présenté par une personne sous le pseudonyme de Satoshi Nakamoto, qui annonce son système en 2008 et publie le code source en 2009.", 'abbreviation' => "Btc" ],
			[ 'name' => "ethereum", 'describe' => "L’idée d’Ethereum a été avancée fin 2013 par Vitalik Buterin, un informaticien russo-canadien de 19 ans à l’époque. La plateforme, lancée le 30 juillet 2015, connaît un boom de popularité depuis mars 2017, devenant aujourd’hui la deuxième plus grosse crypto monnaie en circulation. La partie monétaire au sens strict d’Ethereum est pour le moment largement inspirée du bitcoin ; mais ce qui rend cette plateforme aussi intéressante, c’est la porte qu’elle ouvre pour le concept de contrat intelligent, en anglais « smart contract ».", 'abbreviation' => "Eth"]
		];

		foreach( $coins as $coin ){
			App\CryptoCoin::create(array(
				'name' => $coin['name'],
				'describe' => $coin['describe'],
				'abbreviation' => $coin['abbreviation'],
			));
		}

    }
}
