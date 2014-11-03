<?php
/**
 * \AppserverIo\LogServer\Modules\CoreModule
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Server
 * @package    LogServer
 * @subpackage Modules
 * @author     Johann Zelger <jz@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io/logserver
 */

namespace AppserverIo\LogServer\Modules;

use TechDivision\Connection\ConnectionRequestInterface;
use TechDivision\Connection\ConnectionResponseInterface;
use TechDivision\Http\HttpProtocol;
use TechDivision\Http\HttpResponseStates;
use TechDivision\Http\HttpRequestInterface;
use TechDivision\Http\HttpResponseInterface;
use TechDivision\Server\Dictionaries\ModuleHooks;
use TechDivision\Server\Dictionaries\ServerVars;
use TechDivision\Server\Dictionaries\ModuleVars;
use TechDivision\Server\Interfaces\ModuleInterface;
use TechDivision\Server\Interfaces\RequestContextInterface;
use TechDivision\Server\Interfaces\ServerContextInterface;
use TechDivision\Server\Exceptions\ModuleException;
use TechDivision\Server\Dictionaries\MimeTypes;
use TechDivision\WebServer\Modules\CoreModule as HttpCoreModule;

/**
 * Class CoreModule
 *
 * @category   Server
 * @package    LogServer
 * @subpackage Modules
 * @author     Johann Zelger <jz@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io/logserver
 */
class CoreModule extends HttpCoreModule implements ModuleInterface
{

    /**
     * Implement's module logic for given hook
     *
     * @param \TechDivision\Connection\ConnectionRequestInterface     $request        A request object
     * @param \TechDivision\Connection\ConnectionResponseInterface    $response       A response object
     * @param \TechDivision\Server\Interfaces\RequestContextInterface $requestContext A requests context instance
     * @param int                                                     $hook           The current hook to process logic for
     *
     * @return bool
     * @throws \TechDivision\Server\Exceptions\ModuleException
     */
    public function process(
        ConnectionRequestInterface $request,
        ConnectionResponseInterface $response,
        RequestContextInterface $requestContext,
        $hook
    ) {
        /** @var $request \TechDivision\Http\HttpRequestInterface */
        /** @var $request \TechDivision\Http\HttpRequestInterface */

        // if false hook is comming do nothing
        if (ModuleHooks::REQUEST_POST !== $hook) {
            return;
        }

        // check if core module should still handle this request
        // maybe later on this can be overwritten by another core module for some reasons
        if ($requestContext->getServerVar(ServerVars::SERVER_HANDLER) !== self::MODULE_NAME) {
            // stop processing
            return;
        }

        $this->populateRequestContext($requestContext);

        // check if core module should still handle this request
        if ($requestContext->getServerVar(ServerVars::SERVER_HANDLER) !== self::MODULE_NAME) {
            // stop processing
            return;
        }

    }

    /**
     * Return's an array of module names which should be executed first
     *
     * @return array The array of module names
     */
    public function getDependencies()
    {
        return array();
    }
}
