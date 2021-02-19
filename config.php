<?php

// load GCS library
require_once 'vendor/fupload/autoload.php';

use Google\Cloud\Storage\StorageClient;

// Please use your own private key (JSON file content) which was downloaded in step 3 and copy it here
// your private key JSON structure should be similar like dummy value below.
// WARNING: this is only for QUICK TESTING to verify whether private key is valid (working) or not.  
// NOTE: to create private key JSON file: https://console.cloud.google.com/apis/credentials  
$privateKeyFileContent = '{
  "type": "service_account",
  "project_id": "certificate-project-303705",
  "private_key_id": "940375cd30224967d8fd6269ea1b5a30d3e0c124",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDkN5Tsv6JE5g5f\ngQ02pGZvEsChtl5eCkYu3GrHPPQNmHe2i6Ylksj8nqEuhDHe7fV5IQAl/VqbyYlt\nuec4ZIP5zG+1ltKbo7Phnw8hMWtRs/PAdn2VRWcJ4BemLArqlmP51eiu/A7Ziwo5\n19iM8I0paB1O7IlUYly5pAM3UBFXa1fIqjuq1w0iRpun/aCliGK+/xIipQwYIlDC\nWvb55wzRFvOmzZsGMZNk8tnrCax8o7nDYwImSn0eilrkyANd75hWtVH/kDwpFhMT\npeFal90feICSltOp4LrIkVQJkMyyNz5TzIqQdkdgVOQpDKWsllz/k519QlB5mzfI\nYYqURad5AgMBAAECggEAA1d3gihzsDHUrcwSVRWe7Nsv0CZfFx4sJSlD1H9FXRIZ\nlaYRlJ0DvaQ2fLuBje+6z49exM+jBSM0NJO7aaFaJ90ZGSX4V0BURNZbBrvGJCQA\nCpZJlDcYEUZTXlLohYMWe2zpC2/kKUYOjCaHlJe8n2m3fSV8RMysaij3RZbx7A9e\nnVRQTevxyyNr5tZwbOx/OtGhdvrDLYKqjLNIlBgV9nCPj7SigaOycKvwyQZ7ulwX\nIt2hAOIikhBnfTZ5yHqSa2P5USJXKQQJCf7nYUmcAI6BZfCP95NBCtn/+Nbe9sir\nKSywgB0ZZnQXNfXYb9D4otorPgq957F/4yuKJXpfcQKBgQD0iJqyv7FvsR5CYezc\n+LhIr3og4/eAJnCf45E+6S0Jn58GlMDax/E3FNpx3z3NX4LO31gssjVJIzzflToW\nYucDXJbrmWtdyozuMEjwPd48cER43EgknSrV5rHX97T0+2nwEkh/bZccQT61LBrd\n7K94pstfBriyBbklxBOL7RjhSQKBgQDu6x0BItXtLzU1sND4IdAHCR7kvm8Ujt0g\nDJ31/SRONzsrML4p6UwcUqlXWUFIfy6XNAC7PWyuz1NWIbZoxkBlxMJ5tgiDLAfP\n8lnOnUc0qiHvYkj5G8pv+aM90letQZZmI/G00ljYeZ/cNXOXfNVl2C8Xn/3HSTEc\n8UiKoubEsQKBgQDLt7pZTAXAbSguWXKBLNwqAbaXDBQ3OM7/BREN/ig9KjPLwcVg\n/s1f/Al4cGkGXZmWSs8kfVqTEb427hU0bTTTwiEhKfEedA4wqR06t/AbHdSNc8bO\nafkztjtXFtA0f/djv3eSYXRQX7KkMJg5ZmNQ+nPXOLxJ4ya55b37Bo2BsQKBgFST\nppDgZBqyu4NmNJOiZKIY+HbBc1EzwdO2o7SRCGkn5CpF9wufKvJb0Na7IgEoBLZC\nEoA2HmNDwZycEpbEl8du/+lWJ21ICPv0LxaVVr+t+pVjlbGZxPAez0rzS1ZqAXPn\nBYmdbRY0+AJcaa8W4fRLs2AJoy0JG/nC8IsjX84BAoGAYLsuve3mw84s+ybmV09c\nR9E6fSUoXbbCxn77zO3pB3foJffFBv278c+vvYzmJmpf0FxNVjs7/XFU6RjoxHQc\nZ5dEiOJtQ3Gv89bwV7g0i3FNF+tEJMGT7rP3HVMAoVNJ/bluCIGdg7UvLnQ9JiCi\nUOp9pYxWtnviOwrt5riC2h4=\n-----END PRIVATE KEY-----\n",
  "client_email": "gcp-storage-upload@certificate-project-303705.iam.gserviceaccount.com",
  "client_id": "113159614740399784358",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/gcp-storage-upload%40certificate-project-303705.iam.gserviceaccount.com"
}';

/*
 * NOTE: if the server is a shared hosting by third party company then private key should not be stored as a file,
 * may be better to encrypt the private key value then store the 'encrypted private key' value as string in database,
 * so every time before use the private key we can get a user-input (from UI) to get password to decrypt it.
 */

function uploadFile($bucketName, $fileContent, $cloudPath) {
    $privateKeyFileContent = $GLOBALS['privateKeyFileContent'];
    // connect to Google Cloud Storage using private key as authentication
    try {
        $storage = new StorageClient([
            'keyFile' => json_decode($privateKeyFileContent, true)
        ]);
    } catch (Exception $e) {
        // maybe invalid private key ?
        print $e;
        return false;
    }

    // set which bucket to work in
    $bucket = $storage->bucket('certdocs_bucket');
    // upload/replace file 
    $storageObject = $bucket->upload(
            $fileContent,
            ['name' => $cloudPath]
            // if $cloudPath is existed then will be overwrite without confirmation
            // NOTE: 
            // a. do not put prefix '/', '/' is a separate folder name  !!
            // b. private key MUST have 'storage.objects.delete' permission if want to replace file !
    );

    // is it succeed ?
    return $storageObject != null;
}

function getFileInfo($bucketName, $cloudPath) {
    $privateKeyFileContent = $GLOBALS['privateKeyFileContent'];
    // connect to Google Cloud Storage using private key as authentication
    try {
        $storage = new StorageClient([
            'keyFile' => json_decode($privateKeyFileContent, true)
        ]);
    } catch (Exception $e) {
        // maybe invalid private key ?
        print $e;
        return false;
    }

    // set which bucket to work in
    $bucket = $storage->bucket('certdocs_bucket');
    $object = $bucket->object($fileContent);
    return $object->info();
}
//this (listFiles) method not used in this example but you may use according to your need 
function listFiles($bucket, $directory = null) {

    if ($directory == null) {
        // list all files
        $objects = $bucket->objects();
    } else {
        // list all files within a directory (sub-directory)
        $options = array('prefix' => 'uploads/');
        $objects = $bucket->objects();
    }

    foreach ($objects as $object) {
        print $object->name() . PHP_EOL;
        // NOTE: if $object->name() ends with '/' then it is a 'folder'
    }
}
?>
