<?php

namespace console\controllers;

use yii\console\Controller;
use Yii;

class SeedController extends Controller
{
    public function actionIndex()
    {
        $db = Yii::$app->db;

        // translators
        $db->createCommand()->batchInsert('translators', ['id', 'name'], [
            [1, 'Иван Иванов'],
            [2, 'Петр Петров'],
            [3, 'Анна Смирнова'],
        ])->execute();

        // schedule
        $db->createCommand()->batchInsert('schedule', ['translator_id', 'date', 'is_working_day'], [
            [1, '2026-03-17', 1],
            [2, '2026-03-21', 1],
            [3, '2026-03-17', 0],
        ])->execute();

        echo "Data inserted\n";
    }
}