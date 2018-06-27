<?php
$sPhoneNum = '33786100359'; // Le numéro de téléphone qui recevra l'SMS (avec le préfixe, ex: +33)
$aProviders = array('vtext.com', 'tmomail.net', 'txt.att.net', 'mobile.pinger.com', 'page.nextel.com');
foreach ($aProviders as $sProvider)
{
   if(mail($sPhoneNum . '@' . $sProvider . '.com', '', 'Ce texto a été envoyé avec PHP, tout simplement !'))
   {
       // C'est bon, l'SMS a correctement été envoyé avec le fournissuer
       break;
   }
   else
   {
       // L'envoi de l'SMS a échoué avec le fournisseur, nous en essayons un autre dans la liste $aProviders
       continue;
   }
}
?>
