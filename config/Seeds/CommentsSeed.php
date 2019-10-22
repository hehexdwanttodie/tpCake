<?php
use Migrations\AbstractSeed;

/**
 * Comments seed.
 */
class CommentsSeed extends AbstractSeed
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
                'produit_id' => '7',
                'title' => 'Great 10/10 would recommend',
                'comment' => 'Wow this phone is insane',
            ],
            [
                'id' => '2',
                'produit_id' => '1',
                'title' => 'Wow',
                'comment' => 'Its the same as the S10 but cheaper.',
            ],
            [
                'id' => '3',
                'produit_id' => '2',
                'title' => '...',
                'comment' => 'I mean the phone is worth more then my car... not worth at all ',
            ],
            [
                'id' => '4',
                'produit_id' => '4',
                'title' => 'Apple isnt good',
                'comment' => 'Apple is the worst compagny ive ever seen!',
            ],
            [
                'id' => '5',
                'produit_id' => '3',
                'title' => 'Apple',
                'comment' => 'Yeah I really dont like apple',
            ],
        ];

        $table = $this->table('comments');
        $table->insert($data)->save();
    }
}
