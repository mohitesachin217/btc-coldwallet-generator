<?php
require 'vendor/autoload.php';

use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Network\NetworkFactory;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;
use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Crypto\EcAdapter\Secp256k1\PublicKey;
use BitWasp\Buffertools\Buffer;

$network = NetworkFactory::bitcoin();
$privateKeyFactory = new PrivateKeyFactory();

// Create a random number generator
$random = new Random();

// Generate a new private key
$privateKey = $privateKeyFactory->generateCompressed($random);

$publicKey = $privateKey->getPublicKey();
$address = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());

echo "Generated Private Key (WIF): " . $privateKey->toWif() . "\n";
echo "Bitcoin Address: " . $address->getAddress() . "\n";

?>
