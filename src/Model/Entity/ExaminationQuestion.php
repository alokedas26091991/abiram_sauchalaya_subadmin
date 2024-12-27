<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExaminationQuestion Entity
 *
 * @property int $id
 * @property int $examination_category_id
 * @property int $question_id
 * @property int $examination_id
 * @property \Cake\I18n\FrozenTime $create_date
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $last_update_date
 * @property int $last_updated_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ExaminationCategory $examination_category
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Examination $examination
 * @property \App\Model\Entity\UserExaminationAnswer[] $user_examination_answers
 */
class ExaminationQuestion extends Entity
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
        'examination_category_id' => true,
        'question_id' => true,
        'examination_id' => true,
        'create_date' => true,
        'created_by' => true,
        'last_update_date' => true,
        'last_updated_by' => true,
        'is_deleted' => true,
        'examination_category' => true,
        'question' => true,
        'examination' => true,
        'user_examination_answers' => true,
    ];
}