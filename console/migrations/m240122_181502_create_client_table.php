<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m240122_181502_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull(),
            'type_people' => $this->string()->notNull(),
            'birthday' => $this->date(),
            'access_club' => $this->string()->null(),

            'date_create' => $this->timestamp(),
            'user_create' => $this->integer()->notNull(),

            'date_update' => $this->timestamp()->null(),
            'user_update' => $this->integer()->null(),

            'date_delete' => $this->timestamp()->null(),
            'user_delete' => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk-client-user_create',
            'client',
            'user_create',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-client-user_update',
            'client',
            'user_update',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-client-user_delete',
            'client',
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
        $this->dropTable('{{%client}}');
    }
}
