<?php
/*
 * El siguiente codigo fue desarrollado por Ruben Barrios
 * En respuesta a la prueba propuesta por la empresa Octano
 * Con el fin de participar en la disputa por el puesto de trabajo ofrecido
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

$cakeDescription = 'Prueba Octano: Por Ruben Barrios';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>
        </title>

        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('base.css') ?>
        <?= $this->Html->css('cake.css') ?>
        <?= $this->Html->css('home.css') ?>
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    </head>
    <body class="home">

        <header class="row">
            <div class="header-image"><?= $this->Html->image('cake.logo.svg') ?></div>
            <div class="header-title">
                <h1>Bienvenido a la prueba realizada por Ruben Barrios.</h1>
            </div>
            <div align="center">
                    <?= $this->Html->link('Iniciar Sesión', ['controller'=>'users', 'action'=>'login']) ?>
            </div>
        </header>

        <div class="row">
            <div class="columns large-12">
                <div class="ctp-warning alert text-center">
                    <p>Codigo realizado en el framework CakePHP con MVC.</p>
                </div>
                <?php Debugger::checkSecurityKeys(); ?>
            </div>
        </div>

        <div class="row">
            <div class="columns large-6">
                <h4>Probar conexión a la Base de Datos</h4>
                <?php
                try {
                    $connection = ConnectionManager::get('default');
                    $connected = $connection->connect();
                } catch (Exception $connectionError) {
                    $connected = false;
                    $errorMsg = $connectionError->getMessage();
                    if (method_exists($connectionError, 'getAttributes')) :
                        $attributes = $connectionError->getAttributes();
                        if (isset($errorMsg['message'])) :
                            $errorMsg .= '<br />' . $attributes['message'];
                        endif;
                    endif;
                }
                ?>
                <ul>
                <?php if ($connected) : ?>
                    <li class="bullet success">La conexión a la base de datos fue satisfactoria.</li>
                <?php else : ?>
                    <li class="bullet problem">No fue posible conectarse a la base de datos.<br /><?= $errorMsg ?></li>
                <?php endif; ?>
                </ul>
            </div>
            <div class="columns large-6">
                <h3>Archivos de Descarga</h3>
                <ul>
                    <li class="bullet book"><a target="_blank" href="https://book.cakephp.org/3.0/en/">Documentos CakePHP 3.0</a></li>
                    <li class="bullet book"><a target="_blank" href="https://book.cakephp.org/3.0/en/tutorials-and-examples/cms/installation.html">Tutorial de CMS en 15 min</a></li>
                </ul>
            </div>
            <hr />
        </div>

        <div class="row">
            <div class="columns large-12 text-center">
                <h3 class="more">Datos que se muestran sin necesidad de iniciar sesión</h3>
                <p>
                    CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Front Controller and MVC.<br />
                    Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.
                </p>
            </div>
            <hr/>
        </div>
    </body>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        <p align="center">
                            <span>&copy; 2017 Rub&eacute;n Antonio Barrios Fuentes</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>