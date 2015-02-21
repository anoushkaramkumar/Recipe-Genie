<? php
$me = $plus->people->get('me');
print "ID: {$me['id']}\n";
print "Display Name: {$me['displayName']}\n";
print "Image Url: {$me['image']['url']}\n";
print "Url: {$me['url']}\n";
?> 