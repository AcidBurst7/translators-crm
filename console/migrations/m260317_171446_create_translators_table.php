<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%translators}}`.
 */
class m260317_171446_create_translators_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%translators}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(155)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%translators}}');
    }
}
