<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\Actions\Actions;
use Piwik\Tracker\Action;
use Piwik\Tracker\Request;

/**
 * This class represents a download.
 * This is a particular type of Action: it has no 'name'
 */
class ActionDownloadUrl extends Action
{
    public function __construct(Request $request)
    {
        parent::__construct(self::TYPE_DOWNLOAD, $request);
        $this->setActionUrl($request->getParam('download'));
    }

    public static function shouldHandle($request)
    {
        $downloadUrl = $request->getParam('download');

        return !empty($downloadUrl);
    }

    protected function getActionsToLookup()
    {
        return array(
            // Note: we do not normalize download URL
            'idaction_url' => array($this->getActionUrl(), $this->getActionType())
        );
    }

}
