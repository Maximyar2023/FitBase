<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club}}`.
 */
class m240122_180322_create_club_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->string()->null(),

            'date_create' => $this->timestamp(),
            'user_create' => $this->integer()->notNull(),

            'date_update' => $this->timestamp()->null(),
            'user_update' => $this->integer()->null(),

            'date_delete' => $this->timestamp()->null(),
            'user_delete' => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk-club-user_create',
            'club',
            'user_create',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-club-user_update',
            'club',
            'user_update',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-club-user_delete',
            'club',
            'user_delete',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%club}}');
    }
}
