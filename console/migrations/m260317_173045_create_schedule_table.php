<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule}}`.
 */
class m260317_173045_create_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'translator_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'is_working_day' => $this
                                    ->boolean()
                                    ->defaultValue(0)
                                    ->comment('1-работает, 0-выходной'),
        ]);

        $this->addForeignKey(
            'fk-schedule-translator_id',
            'schedule',
            'translator_id',
            'translators',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-schedule-translator_id',
            'schedule',
            'translator_id'
        );

        $this->createIndex(
            'idx-schedule-date',
            'schedule',
            'date'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedule}}');
    }
}
