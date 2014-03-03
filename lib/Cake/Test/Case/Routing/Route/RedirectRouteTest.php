<?php
/**
 * CakeRequest Test case file.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Test.Case.Routing.Route
 * @since         CakePHP(tm) v 2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('RedirectRoute', 'Routing/Route');
App::uses('CakeResponse', 'Network');
App::uses('Router', 'Routing');

/**
 * test case for RedirectRoute
 *
 * @package       Cake.Test.Case.Routing.Route
 */
class RedirectRouteTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		Configure::write('Routing', array('admin' => null, 'prefixes' => array()));
		Router::reload();
	}

/**
 * test the parsing of routes.
 *
 * @return void
 */
	public function testParsing() {
		$route = new RedirectRoute('/home', array('controller' => 'Posts'));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/home');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/Posts', true), $header['Location']);

		$route = new RedirectRoute('/home', array('controller' => 'Posts', 'action' => 'index'));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/home');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/Posts', true), $header['Location']);
		$this->assertEquals(301, $route->response->statusCode());

		$route = new RedirectRoute('/google', 'http://google.com');
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/google');
		$header = $route->response->header();
		$this->assertEquals('http://google.com', $header['Location']);

		$route = new RedirectRoute('/Posts/*', array('controller' => 'Posts', 'action' => 'view.ctp'), array('status' => 302));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/Posts/2');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/Posts/view.ctp', true), $header['Location']);
		$this->assertEquals(302, $route->response->statusCode());

		$route = new RedirectRoute('/Posts/*', array('controller' => 'Posts', 'action' => 'view.ctp'), array('persist' => true));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/Posts/2');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/Posts/view.ctp/2', true), $header['Location']);

		$route = new RedirectRoute('/Posts/*', '/test', array('persist' => true));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/Posts/2');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/test', true), $header['Location']);

		$route = new RedirectRoute('/my_controllers/:action/*', array('controller' => 'tags', 'action' => 'add'), array('persist' => true));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/my_controllers/do_something/passme/named:param');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/tags/add/passme/named:param', true), $header['Location']);

		$route = new RedirectRoute('/my_controllers/:action/*', array('controller' => 'tags', 'action' => 'add'));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/my_controllers/do_something/passme/named:param');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/tags/add', true), $header['Location']);

		$route = new RedirectRoute('/:lang/my_controllers', array('controller' => 'tags', 'action' => 'add'), array('lang' => '(nl|en)', 'persist' => array('lang')));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/nl/my_controllers/');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/tags/add/lang:nl', true), $header['Location']);

		Router::$routes = array(); // reset default routes
		Router::connect('/:lang/preferred_controllers', array('controller' => 'tags', 'action' => 'add'), array('lang' => '(nl|en)', 'persist' => array('lang')));
		$route = new RedirectRoute('/:lang/my_controllers', array('controller' => 'tags', 'action' => 'add'), array('lang' => '(nl|en)', 'persist' => array('lang')));
		$route->stop = false;
		$route->response = $this->getMock('CakeResponse', array('_sendHeader'));
		$result = $route->parse('/nl/my_controllers/');
		$header = $route->response->header();
		$this->assertEquals(Router::url('/nl/preferred_controllers', true), $header['Location']);
	}

}
