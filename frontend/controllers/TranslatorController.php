<?php
namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class TranslatorController extends Controller
{
    public function actionList($date)
    {
        $rows = Yii::$app->db->createCommand(
            "SELECT t.id, t.name
                    FROM translators t
                    JOIN schedule s ON s.translator_id = t.id
                    WHERE s.date = :date AND s.is_working_day = 1
                ")
            ->bindValue(':date', $date)
            ->queryAll();

        if ($rows) {
            return $this->asJson([
                'message' => 'Список переводчиков готов',
                'data' => $rows
            ]);
        }

        return $this->asJson([
            'message' => 'Нет свободных переводчиков',
            'data' => []
        ]);
    }
}