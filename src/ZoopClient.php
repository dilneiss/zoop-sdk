<?php
namespace Zoop;
/**
 * ZoopClient class
 * 
 * Essa classe é resonsavel por ser usada como primeira camada
 * uma especie de guarda chuvas para todas as classes registradas
 * dentro de aplicação em formato de bundle, os bundles (classes que
 * podem ser chaamdas seus metodos publicos por essa class cliente
 * são registrados dentro da classe Abstrata extendida pelo cliente
 * Zoop\Zoop).
 * 
 * @method Zoop\MarketPlace\Buyers createBuyer(array $user)
 * @method Zoop\MarketPlace\Buyers getAllBuyers()
 * @method Zoop\MarketPlace\Buyers getBuyer(string $id)
 * 
 * @method Zoop\MarketPlace\Transactions getAllTransactions()
 * @method Zoop\MarketPlace\Transactions getTransaction(string $transaction)
 * 
 * @method Zoop\Payment\CreditCard payCreditCard(array $card)
 * @method Zoop\Payment\Ticket generateTicket(array $ticket, string $userId)
 * 
 * @method Zoop\WebHook\WebHook getAllWebHooks()
 * @method Zoop\WebHook\WebHook createWebHook(string $url, string $description)
 * @method Zoop\WebHook\WebHook deleteWebHook(string $webhookId)
 * 
 * @author italodeveloper <italoaraujo788@gmail.com>
 * @package ZoopClient
 * @version 1.0.0
 */
class ZoopClient extends Zoop 
{
    public function __construct($configurations)
    {
        parent::__construct($configurations);
    }
}