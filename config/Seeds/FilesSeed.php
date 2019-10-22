<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '5',
                'name' => 'apple.png',
                'path' => 'Files/',
                'created' => '2019-10-14 01:39:53',
                'modified' => '2019-10-14 01:39:53',
                'status' => '1',
            ],
            [
                'id' => '6',
                'name' => 'samsung.png',
                'path' => 'Files/',
                'created' => '2019-10-14 01:40:07',
                'modified' => '2019-10-14 01:40:07',
                'status' => '1',
            ],
            [
                'id' => '7',
                'name' => 'google.png',
                'path' => 'Files/',
                'created' => '2019-10-14 01:40:53',
                'modified' => '2019-10-14 01:40:53',
                'status' => '1',
            ],
            [
                'id' => '8',
                'name' => 'OnePlus.png',
                'path' => 'Files/',
                'created' => '2019-10-14 01:41:27',
                'modified' => '2019-10-14 01:41:27',
                'status' => '1',
            ],
            [
                'id' => '9',
                'name' => 'huawei.png',
                'path' => 'Files/',
                'created' => '2019-10-14 01:41:42',
                'modified' => '2019-10-14 01:41:42',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
