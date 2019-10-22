<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '1',
                'username' => 'asdasd',
                'email' => 'cakephp@example.com',
                'password' => '$2y$10$8nBNJl6PEDTm2EL.1RomAuzoT/moSe9baqV9GgryHY8iHPGuryICu',
                'isAdmin' => '0',
                'token' => '',
                'actif' => '0',
                'created' => '2019-08-27 13:20:34',
                'modified' => '2019-09-19 13:11:37',
            ],
            [
                'id' => '2',
                'username' => 'misterphil69',
                'email' => 'lalonde.philippe2@gmail.com',
                'password' => '$2y$10$GxZbDpMeyHf0eVj./LM7Buc.XOihjy3ZrRrZNfjm4BbDfkzlDi51e',
                'isAdmin' => '1',
                'token' => '',
                'actif' => '0',
                'created' => '2019-08-27 09:31:24',
                'modified' => '2019-09-19 13:11:49',
            ],
            [
                'id' => '4',
                'username' => 'newUser',
                'email' => 'newUser@gmail.com',
                'password' => '$2y$10$4/XCFU.ZYZNKuS066yacbuaoyMUv3nLogKrnkbB2p9VYM4rXLUP7K',
                'isAdmin' => '0',
                'token' => '',
                'actif' => '1',
                'created' => '2019-10-15 16:32:53',
                'modified' => '2019-10-15 16:32:53',
            ],
            [
                'id' => '5',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$hkIW58vqYD77BRkjgFlvh.zuE1ZqwBzZ98znoAYUA2Tw9hv.hu2E.',
                'isAdmin' => '1',
                'token' => '',
                'actif' => '1',
                'created' => '2019-10-15 17:16:56',
                'modified' => '2019-10-15 17:16:56',
            ],
            [
                'id' => '14',
                'username' => 'smurf',
                'email' => 'imsmurfing9@gmail.com',
                'password' => '$2y$10$lG6hETtRu3eOzVtWqYR0geOmecDfJbWeLdkGgv/tWCvduxW7iR85.',
                'isAdmin' => '0',
                'token' => '48353d12-f03e-4951-9bdc-ec503dc4e86d',
                'actif' => '1',
                'created' => '2019-10-15 19:37:02',
                'modified' => '2019-10-15 19:37:50',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
