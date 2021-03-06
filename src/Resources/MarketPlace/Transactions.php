<?php
namespace Zoop\Resources\MarketPlace;

use Zoop\Core\Zoop;

/**
 * Transactions class
 * 
 * Essa classe é responsavel por cuidar das transações do vendedor
 * dentro do marketplace e pode ser utilizada para consultar por exemplos
 * boletos (Tickets).
 * 
 * @package Zoop\Marketplace
 * @author italodeveloper <italo.araujo@gmail.com>
 * @version 1.0.0
 */
class Transactions extends Zoop
{
    public function __construct(array $configurations)
    {
        parent::__construct($configurations);
    }

    /**
     * function getAllTransactions
     *
     * Pega todas as transações do vendedor dentro
     * do marketplace
     *
     * @return bool|array
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function getAllTransactions()
    {
        $request = $this->configurations['guzzle']->request(
            'GET', '/v1/marketplaces/'. $this->configurations['marketplace']. '/sellers/' . $this->configurations['auth']['on_behalf_of'] .'/transactions'
        );
        $response = \json_decode($request->getBody()->getContents(), true);
        if($response && is_array($response)){
            return $response;
        }
        return false;
    }

    /**
     * getTransaction function
     *
     * Pega os detalhes de uma transação em especifico
     * utilizando como parametro o id da mesma.
     *
     * @param string $transaction
     *
     * @return array|bool
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function getTransaction($transaction)
    {
        $request = $this->configurations['guzzle']->request(
            'GET', '/v1/marketplaces/'. $this->configurations['marketplace']. '/transactions/'. $transaction
        );
        $response = \json_decode($request->getBody()->getContents(), true);
        if($response && is_array($response)){
            return $response;
        }
        return false;
    }

    /**
     * @param array $transaction
     * @return array|false|mixed
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function postTransaction(array $transaction)
    {
        $request = $this->configurations['guzzle']->request(
            'POST', '/v1/marketplaces/'. $this->configurations['marketplace']. '/transactions',
            ['json' => $transaction]
        );
        $response = \json_decode($request->getBody()->getContents(), true);
        if($response && is_array($response)){
            return $response;
        }
        return false;
    }

    /**
     * @param string $transactionId
     * @return array|false|mixed
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function captureTransaction(string $transactionId, int $amount)
    {
        $request = $this->configurations['guzzle']->request(
            'POST', '/v1/marketplaces/'. $this->configurations['marketplace']. '/transactions/'.$transactionId.'/capture',
            ['json' => [
                'on_behalf_of' => $this->configurations['auth']['on_behalf_of'],
                'amount' => $amount
            ]]
        );
        $response = \json_decode($request->getBody()->getContents(), true);
        if($response && is_array($response)){
            return $response;
        }
        return false;
    }

    /**
     * @param string $transactionId
     * @return array|false|mixed
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function refundTransaction(string $transactionId, int $amount)
    {
        $request = $this->configurations['guzzle']->request(
            'POST', '/v1/marketplaces/'. $this->configurations['marketplace']. '/transactions/'.$transactionId.'/void',
            ['json' => [
                'on_behalf_of' => $this->configurations['auth']['on_behalf_of'],
                'amount' => $amount
            ]]
        );
        $response = \json_decode($request->getBody()->getContents(), true);
        if($response && is_array($response)){
            return $response;
        }
        return false;
    }

}