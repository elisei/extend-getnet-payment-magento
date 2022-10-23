# Extend Getnet Payment Magento
Implementa pré autorização no meio de pagamento da Getnet.

## Detalhes
O plugin irá atuar sobre Getnet\PaymentMagento\Gateway\Request\CcPaymentDataRequest tornando falso o valor para delayed e verdadeiro o pre_authorization.

https://github.com/elisei/extend-getnet-payment-magento/blob/main/Plugin/Gateway/Request/PreAuthCcPaymentDataRequest.php#L38-L39

Também irá atuar sobre o processo de confirmação Getnet\PaymentMagento\Gateway\Http\Client\AcceptPaymentClient adcionando um novo request de ajuste do valor antes da confirmação.
https://github.com/elisei/extend-getnet-payment-magento/blob/main/Plugin/Gateway/Http/Client/PreAuthAcceptPaymentClient.php#L106-L119
