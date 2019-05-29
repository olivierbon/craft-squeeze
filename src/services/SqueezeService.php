<?php
namespace olivierbon\squeeze\services;

use Craft;
use craft\helpers\FileHelper;
use craft\elements\Asset;
use ZipArchive;
use yii\base\Component;

/**
 * SqueezeService Class 
 *
 * @author    Olivier Bon
 * @package   Squeeze
 * @since     1.0.0
 *
 */
class SqueezeService extends Component
{
    public function archive(string $filename, Array $files)
    {
        // Fetch the assets
        $assets = Asset::find()
                ->id($files)
                ->limit(null)
                ->all();

        // Set the archive name to create (name chosen + stamp)
        $tempFile = Craft::$app->getPath()
                ->getTempPath() . DIRECTORY_SEPARATOR . $filename . '_' . time() . '.zip';
        // Create the archive
        $zip = new ZipArchive();
        // Open and fill
        if ($zip->open($tempFile , ZipArchive::CREATE) === TRUE) {

            foreach ($assets as $asset) {
                // Get a temp copy of the file
                $file = $asset->getCopyOfFile();
                // Add to file to archive
                $zip->addFromString($asset->filename, $asset->getContents());
                // Delete the temp file
                FileHelper::unlink($file);
            }
            
            $zip->close();
            
            return $tempFile;   
        }
        
        throw new Exception(Craft::t('Failed to generate the archive'));
    }
}