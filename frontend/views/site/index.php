<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Переводчики';
$this->params['meta_description'] = '';
$this->params['meta_keywords'] = '';
?>
<div class="site-index">
    <div id="app">
        <h3>Переводчики:</h3>

        <ul>
            <li v-for="t in translators" :key="t.id">
                {{ t.name }}
            </li>
        </ul>

        <p v-if="translators.length === 0">
            Нет свободных переводчиков
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

    <script>
        new Vue({
            el: '#app',
            data: {
                translators: []
            },
            created() {
                fetch('/index.php?r=translator/list&date=2026-03-17')
                    .then(r => r.json())
                    .then(data => {
                        this.translators = data.data || [];
                    });
            }
        });
    </script>

</div>
