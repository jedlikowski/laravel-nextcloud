<?php

namespace Jedlikowski\NextCloudStorage;

use League\Flysystem\WebDAV\WebDAVAdapter;
use Sabre\DAV\Xml\Property\ResourceType;

class NextCloudAdapter extends WebDAVAdapter
{
    protected static $metadataFields = [
        '{DAV:}getlastmodified',
        '{DAV:}getetag',
        '{DAV:}getcontenttype',
        '{DAV:}resourcetype',
        '{DAV:}getcontentlength',
        '{http://owncloud.org/ns}size',
    ];

    /**
     * @var array
     */
    protected static $resultMap = [
        '{DAV:}getcontentlength' => 'size',
        '{DAV:}getcontenttype' => 'mimetype',
        'content-length' => 'size',
        'content-type' => 'mimetype',
        '{http://owncloud.org/ns}size' => 'size',
    ];

    protected function isDirectory(array $object)
    {
        if (isset($object['{DAV:}resourcetype']) && $object['{DAV:}resourcetype'] instanceof ResourceType && $object['{DAV:}resourcetype']->is('{DAV:}collection')) {
            return true;
        }

        return parent::isDirectory($object);
    }
}