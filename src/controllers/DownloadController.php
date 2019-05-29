<?php

namespace olivierbon\squeeze\controllers;

use Craft;
use craft\web\Controller;
use olivierbon\squeeze\Squeeze;
use craft\helpers\FileHelper;

/**
 * DownloadController Class 
 *
 * @author    Olivier Bon
 * @package   Squeeze
 * @since     1.0.0
 *
 */
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
     * Trigers when a user wants to download a zip archive.
     *
     * @return Response|null
     */
    public function actionIndex()
    {
        $request = Craft::$app->getRequest();
        // Get the files to zip
        $files = $request->getRequiredParam('files'); // array
        // Get the filename
        $filename = $request->getRequiredParam('archivename'); //string
        // Create the archive
        $archive = Squeeze::getInstance()
            ->squeeze
            ->archive($filename, $files);
        // Push the download
        $response = Craft::$app->getResponse()
            ->sendFile($archive, null, ['forceDownload' => true]);
        // Delete the temps file
        FileHelper::unlink($archive);

        return $response;
    }
}