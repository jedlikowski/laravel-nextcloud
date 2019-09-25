<?php

namespace Jedlikowski\NextCloudStorage\Tests;

use Illuminate\Support\Facades\Storage;
use Jedlikowski\NextCloudStorage\NextCloudAdapter;
use Jedlikowski\NextCloudStorage\NextCloudServiceProvider;

class ServiceProviderTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [NextCloudServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('filesystems.disks.nextcloud', [
            'driver' => 'nextcloud',
            'baseUri' => 'https://mywebdavstorage.com',
            'userName' => 'jedlikowski',
            'password' => 'supersecretpassword',
        ]);
    }

    /** @test */
    public function it_registers_a_webdav_driver()
    {
        $filesystem = Storage::disk('nextcloud');
        $driver = $filesystem->getDriver();
        $adapter = $driver->getAdapter();

        $this->assertInstanceOf(NextCloudAdapter::class, $adapter);
    }

    /** @test */
    public function it_can_have_an_optional_path_prefix()
    {
        $this->app['config']->set('filesystems.disks.nextcloud.pathPrefix', 'prefix');
        $userName = $this->app['config']->get('filesystems.disks.nextcloud.userName');

        $filesystem = Storage::disk('nextcloud');
        $driver = $filesystem->getDriver();
        $adapter = $driver->getAdapter();

        $this->assertInstanceOf(NextCloudAdapter::class, $adapter);
        $this->assertEquals('prefix/remote.php/dav/files/' . $userName . '/', $adapter->getPathPrefix());
    }

    /** @test */
    public function it_can_generate_direct_url_to_file()
    {
        $userName = $this->app['config']->get('filesystems.disks.nextcloud.userName');
        $filesystem = Storage::disk('nextcloud');
        $driver = $filesystem->getDriver();
        $adapter = $driver->getAdapter();

        $filename = 'backup-2019-09-25-21-00-00.zip';
        $targetUrl = 'https://jedlikowski:supersecretpassword@mywebdavstorage.com/remote.php/dav/files/' . $userName . '/' . $filename;

        $this->assertInstanceOf(NextCloudAdapter::class, $adapter);
        $this->assertEquals($targetUrl, $filesystem->url($filename));
    }
}