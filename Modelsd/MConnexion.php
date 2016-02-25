<?php

namespace Nostromo\Models;

use PDO;
use PDOException;
use UnexpectedValueException;

/**
 * Class Connexion.
 *
 * PHP version 5.6
 *
 * @category Models
 *
 * @author   Nostromo <contact@nostromo.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * @link     localhost
 */
class MConnexion
{
    /**
     * BDD Connexion.
     *
     * @return PDO
     */
    public static function getBdd()
    {
        $host = 'localhost';
        $dbname = '2014-nostromo_base';
        $user = 'root';
        $mdp = 'admin';
        try {
            $pdo = new PDO(
                'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8',
                $user,
                $mdp,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );

            return $pdo;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * User connected.
     *
     * @return bool
     */
    public static function sessionOuverte()
    {
        return array_key_exists('Utilisateur', $_SESSION);
    }

    /**
     * Ajoute un message flash alert.
     *
     * @param string $message Message
     * @param string $type    Type
     *
     * @throws UnexpectedValueException
     */
    public static function setFlashMessage($message = 'Erreur inconnue', $type = 'error')
    {
        switch ($type) {
            case 'valid':
                $_SESSION['valid'] = $message;
                if (array_key_exists('error', $_SESSION)) {
                    unset($_SESSION['error']);
                }
                break;
            case 'error':
                $_SESSION['error'] = $message;
                if (array_key_exists('valid', $_SESSION)) {
                    unset($_SESSION['valid']);
                }
                break;
            default:
                $_SESSION['error'] = 'Type d\'erreur inconnu';
                break;
        }
    }
}
