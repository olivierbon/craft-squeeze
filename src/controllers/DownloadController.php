<?php

namespace olivierbon\squeeze\controllers;

use Craft;
use craft\web\Controller;
use olivierbon\squeeze\Squeeze;
use yii\web\Response;

use Composer\Package\Archiver\ZipArchive

class DownloadController extends Controller
{

    // Properties
    // =========================================================================
    /**
     * @inheritdoc
     */
    public $allowAnonymous = true;

    // Public Methods
    // =========================================================================
    /**
     * Sends a contact form submission.
     *
     * @return Response|null
     */
    public function actionIndex()
    {
        $request = Craft::$app->getRequest();
        $fileName = $request->getBodyParam('filename'); //string
        $files = $request->getBodyParam('files'); // array

        // Craft::zip();
        Craft::dd(new ZipArchive);
    }
}