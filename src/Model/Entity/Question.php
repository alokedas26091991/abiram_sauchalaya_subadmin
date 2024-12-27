<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $question
 * @property \Cake\I18n\FrozenTime $create_date
 * @property int $created_by
 * @property int|null $supervisor
 * @property int|null $reviewer
 * @property int|null $data_entry
 * @property int|null $super_reviewer
 * @property int $status
 * @property \Cake\I18n\FrozenTime $last_update_date
 * @property int $last_updated_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ExaminationQuestion[] $examination_questions
 * @property \App\Model\Entity\QuestionAnswer[] $question_answers
 * @property \App\Model\Entity\UserExaminationAnswer[] $user_examination_answers
 */
class Question extends Entity
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
        'question' => true,
        'create_date' => true,
        'created_by' => true,
        'supervisor' => true,
        'reviewer' => true,
        'data_entry' => true,
        'super_reviewer' => true,
        'status' => true,
        'last_update_date' => true,
        'last_updated_by' => true,
        'is_deleted' => true,
        'examination_questions' => true,
        'question_answers' => true,
        'user_examination_answers' => true,
    ];
}
