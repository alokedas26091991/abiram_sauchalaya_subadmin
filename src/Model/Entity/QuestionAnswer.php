<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionAnswer Entity
 *
 * @property int $id
 * @property int $question_id
 * @property string $q_option
 * @property bool $is_correct
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Question $question
 */
class QuestionAnswer extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'question_id' => true,
        'q_option' => true,
        'is_correct' => true,
        'is_deleted' => true,
        'question' => true,
    ];
}
